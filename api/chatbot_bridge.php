<?php
header('Content-Type: application/json');
session_start();

// 1. Session Management
if (!isset($_SESSION['chat_session_id'])) {
    $_SESSION['chat_session_id'] = uniqid('sess_', true);
}
$session_id = $_SESSION['chat_session_id'];

// 2. Read Input
$input = json_decode(file_get_contents('php://input'), true);
$message = isset($input['message']) ? trim($input['message']) : '';

if (empty($message)) {
    echo json_encode(['reply' => 'Pesan tidak boleh kosong']);
    exit;
}

// 3. n8n Configuration
$n8n_webhook_url = 'https://shifty-chuck-leisurely.ngrok-free.dev/webhook/chat-ai'; // Updated by User

// 4. Prepare Payload - strictly per user request
$payload = [
    'message' => $message,
    'session_id' => $session_id
];

// 5. Send to n8n via cURL
$ch = curl_init($n8n_webhook_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout after 30 seconds

try {
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }

    $decoded_response = json_decode($response, true);

    // Check if n8n returned success (usually 200) and valid JSON
    if ($http_code === 200 && $decoded_response) {
        // User Expectation: response in 'output' or 'reply' field
        $bot_reply = "Maaf, saya tidak mengerti respon dari sistem.";

        if (isset($decoded_response['output'])) {
            $bot_reply = $decoded_response['output'];
        } elseif (isset($decoded_response['reply'])) {
            $bot_reply = $decoded_response['reply'];
        } else {
            // Fallback: try to find any string message or just dump json if debugging
            // ensuring we return a string for the frontend
            $bot_reply = isset($decoded_response['message']) ? $decoded_response['message'] : json_encode($decoded_response);
        }

        echo json_encode(['reply' => $bot_reply]);
    } else {
        // Error from n8n or non-200 OK
        $error_msg = isset($decoded_response['message']) ? $decoded_response['message'] : "Gagal terhubung ke n8n (Status: $http_code)";
        // If n8n returns an error object, we try to pass it simply
        echo json_encode(['reply' => "System Error: " . $error_msg]);
    }

} catch (Exception $e) {
    // Fallback error
    error_log("Chatbot Bridge Error: " . $e->getMessage());
    echo json_encode(['reply' => "Maaf, saat ini sistem sedang sibuk. (Error: " . $e->getMessage() . ")"]);
} finally {
    curl_close($ch);
}
?>