<?php
/**
 * Check Availability API
 * Returns all booked dates from database
 * 
 * Method: GET
 * Parameters: 
 *   - month (optional): Filter by month (1-12)
 *   - year (optional): Filter by year (YYYY)
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once '../config/database.php';

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed. Use GET.'
    ]);
    exit;
}

try {
    $conn = getDBConnection();

    // Get optional filters
    $month = isset($_GET['month']) ? intval($_GET['month']) : null;
    $year = isset($_GET['year']) ? intval($_GET['year']) : null;

    // Build query
    $sql = "SELECT tgl_mulai, tgl_selesai, nama_lengkap, jumlah_tamu FROM booking WHERE 1=1";

    // Add filters if provided
    if ($month && $year) {
        $sql .= " AND (MONTH(tgl_mulai) = ? AND YEAR(tgl_mulai) = ?)";
    } elseif ($year) {
        $sql .= " AND YEAR(tgl_mulai) = ?";
    }

    $sql .= " ORDER BY tgl_mulai ASC";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    // Bind parameters if filters exist
    if ($month && $year) {
        $stmt->bind_param("ii", $month, $year);
    } elseif ($year) {
        $stmt->bind_param("i", $year);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Collect all booked dates
    $bookedDates = [];
    $bookedRanges = [];

    while ($row = $result->fetch_assoc()) {
        $startDate = $row['tgl_mulai'];
        $endDate = $row['tgl_selesai'];

        // Add booking range info
        $bookedRanges[] = [
            'start' => $startDate,
            'end' => $endDate,
            'guest_name' => $row['nama_lengkap'],
            'guest_count' => $row['jumlah_tamu']
        ];

        // Generate all dates in range
        $current = new DateTime($startDate);
        $end = new DateTime($endDate);

        while ($current <= $end) {
            $dateStr = $current->format('Y-m-d');
            if (!in_array($dateStr, $bookedDates)) {
                $bookedDates[] = $dateStr;
            }
            $current->modify('+1 day');
        }
    }

    $stmt->close();
    $conn->close();

    // Return response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'data' => [
            'booked_dates' => $bookedDates,
            'bookings' => $bookedRanges,
            'total' => count($bookedRanges),
            'filter' => [
                'month' => $month,
                'year' => $year
            ]
        ]
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Internal server error',
        'error' => $e->getMessage()
    ]);
}
?>