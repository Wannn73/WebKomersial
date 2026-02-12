<?php
/**
 * Booking API Endpoint
 * Handles booking form submissions and saves to database
 * 
 * Method: POST
 * Content-Type: application/json or application/x-www-form-urlencoded
 */

// Set headers
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Include database configuration
require_once '../config/database.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed. Use POST.'
    ]);
    exit;
}

// Get POST data
$data = [];
if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
} else {
    $data = $_POST;
}

// Validation function
function validateBookingData($data)
{
    $errors = [];

    // Required fields
    $required = ['startDate', 'duration', 'guestCount', 'fullName', 'phone', 'email', 'eventName'];

    foreach ($required as $field) {
        if (empty($data[$field])) {
            $errors[] = "Field '$field' is required";
        }
    }

    // Email validation
    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Phone validation (Indonesian format)
    if (!empty($data['phone']) && !preg_match('/^[0-9]{9,13}$/', $data['phone'])) {
        $errors[] = "Invalid phone number format (9-13 digits)";
    }

    // Guest count validation
    if (!empty($data['guestCount']) && (!is_numeric($data['guestCount']) || $data['guestCount'] < 1)) {
        $errors[] = "Guest count must be a positive number";
    }

    // Date validation
    if (!empty($data['startDate'])) {
        $date = DateTime::createFromFormat('Y-m-d', $data['startDate']);
        if (!$date || $date->format('Y-m-d') !== $data['startDate']) {
            $errors[] = "Invalid date format (use YYYY-MM-DD)";
        } else {
            // Check if date is in the past
            $today = new DateTime();
            $today->setTime(0, 0, 0);
            if ($date < $today) {
                $errors[] = "Cannot book past dates";
            }
        }
    }

    return $errors;
}

// Calculate end date based on duration
// Calculate end date based on duration
function calculateEndDate($startDate, $duration)
{
    $date = new DateTime($startDate);

    // Handle "Setengah Hari"
    if (strpos($duration, 'Setengah') !== false) {
        return $date->format('Y-m-d');
    }

    // Handle "X Hari"
    $days = intval($duration);
    if ($days > 1) {
        $date->modify('+' . ($days - 1) . ' days');
    }

    return $date->format('Y-m-d');
}

// Calculate time slot based on duration
function calculateTimeSlot($duration)
{
    switch ($duration) {
        case 'Setengah Hari':
            return '08:00 - 14:00';
        case '1 Hari':
            return '08:00 - 22:00';
        case '2 Hari':
            return 'Full Day + 1';
        default:
            return 'Full Day';
    }
}

try {
    // Validate input
    $errors = validateBookingData($data);

    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $errors
        ]);
        exit;
    }

    // Get database connection
    $conn = getDBConnection();

    // Calculate end date
    $endDate = calculateEndDate($data['startDate'], $data['duration']);
    $timeSlot = calculateTimeSlot($data['duration']);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO booking (nama_lengkap, no_hp, email, nama_acara, tgl_mulai, tgl_selesai, jam_acara, jumlah_tamu, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    // Use user input for eventName
    $eventName = $data['eventName'];
    $jamAcara = "Full Day"; // Default value since input is removed

    // Bind parameters
    $stmt->bind_param(
        "sssssssi",
        $data['fullName'],
        $data['phone'],
        $data['email'],
        $eventName,
        $data['startDate'],
        $endDate,
        $jamAcara,
        $data['guestCount']
    );

    // Execute
    if ($stmt->execute()) {
        $bookingId = $conn->insert_id;

        http_response_code(201);
        echo json_encode([
            'success' => true,
            'message' => 'Booking berhasil disimpan!',
            'data' => [
                'booking_id' => $bookingId,
                'nama_lengkap' => $data['fullName'],
                'no_hp' => $data['phone'],
                'email' => $data['email'],
                'tgl_mulai' => $data['startDate'],
                'tgl_selesai' => $endDate,
                'jam_acara' => $timeSlot,
                'jumlah_tamu' => $data['guestCount'],
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    } else {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Internal server error',
        'error' => $e->getMessage()
    ]);
}
?>