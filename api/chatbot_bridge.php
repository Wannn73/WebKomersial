<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// 1. Read Input
$input = json_decode(file_get_contents('php://input'), true);
$message = isset($input['message']) ? trim($input['message']) : '';
$session_id = isset($input['session_id']) ? trim($input['session_id']) : '';

if (empty($message)) {
    echo json_encode(['output' => 'Pesan tidak boleh kosong']);
    exit;
}

// Fallback session ID if not provided by client (though client should provide it)
if (empty($session_id)) {
    $session_id = uniqid('sess_', true);
}

// 2. n8n Configuration
$n8n_webhook_url = 'https://alesia-unlegible-ungelatinously.ngrok-free.dev/webhook/chat-ai';

// 3. Prepare Payload
$payload = [
    'message' => $message,
    'session_id' => $session_id
];

// 4. Send to n8n via cURL
$ch = curl_init($n8n_webhook_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Increased timeout for database queries

try {
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }

    $decoded_response = json_decode($response, true);

    // Check if n8n returned success (usually 200) and valid JSON
    if ($http_code === 200 && $decoded_response) {
        $bot_reply = "Maaf, saya tidak mengerti respon dari sistem.";

        // Prioritize 'output' field as requested
        if (isset($decoded_response['output'])) {
            $bot_reply = $decoded_response['output'];
        } elseif (isset($decoded_response['reply'])) {
            $bot_reply = $decoded_response['reply'];
        } else {
            // Fallback: try to find any string message
            $bot_reply = isset($decoded_response['message']) ? $decoded_response['message'] : json_encode($decoded_response);
        }

        // Return 'output' to frontend
        echo json_encode(['output' => $bot_reply]);
    } else {
        // Error from n8n or non-200 OK
        $error_msg = isset($decoded_response['message']) ? $decoded_response['message'] : "Gagal terhubung ke n8n (Status: $http_code)";
        echo json_encode(['output' => "System Error: " . $error_msg]);
    }

} catch (Exception $e) {
    error_log("Chatbot Bridge Error: " . $e->getMessage());
    echo json_encode(['output' => "Maaf, saat ini sistem sedang sibuk. Mohon coba lagi nanti."]);
} finally {
    curl_close($ch);
}
?>