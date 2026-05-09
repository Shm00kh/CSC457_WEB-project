<?php

header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);

$message = $input["message"] ?? "";

$apiKey = "A8IGGaMV5SvmPlhPajN2humvo2P8XSLzE8Q8443p0Wo8cNxRFiG7JQQJ99CEACHYHv6XJ3w3AAAAACOGi0ep";

$endpoint = "https://csc457-resource.services.ai.azure.com/models/chat/completions?api-version=2024-05-01-preview";

$data = [
    "model" => "DeepSeek-V4-Flash",
    "messages" => [
        [
            "role" => "system",
            "content" => "أنت رحّال 😎 مساعد سعودي لطيف ومرح. تساعد الناس يكتشفون مناطق السعودية والمعالم والأماكن الحلوة والمطاعم والفعاليات بطريقة ودية وعفوية."
        ],
        [
            "role" => "user",
            "content" => $message
        ]
    ],
    "temperature" => 0.7,
    "max_tokens" => 200
];

$options = [
    "http" => [
        "header" => [
            "Content-Type: application/json",
            "api-key: " . $apiKey
        ],
        "method" => "POST",
        "content" => json_encode($data)
    ]
];

$context = stream_context_create($options);

$response = file_get_contents($endpoint, false, $context);

if ($response === FALSE) {
    echo json_encode([
        "reply" => "صار خطأ بالاتصال 😅"
    ]);
    exit;
}

$result = json_decode($response, true);

$reply = $result["choices"][0]["message"]["content"] ?? "ماقدرت أجاوب الحين 😅";

echo json_encode([
    "reply" => $reply
]);

?>
