<?php
require 'config.php';

if (!isset($_POST['question'])) {
    exit("No question provided");
}

$question = $_POST['question'];

$data = [
    "model" => "mistralai/mistral-7b-instruct", // free model
    "messages" => [
        ["role" => "user", "content" => $question]
    ]
];

$ch = curl_init("https://openrouter.ai/api/v1/chat/completions");

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer " . OPENROUTER_API_KEY,
        "HTTP-Referer: http://localhost",
        "X-Title: PHP AI Chatbot"
    ],
    CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if(isset($result['error'])) {
    echo "API Error: " . $result['error']['message'];
    exit;
}

echo $result['choices'][0]['message']['content'] ?? "No response";
?>