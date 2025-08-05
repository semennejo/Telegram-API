<?php

declare(strict_types=1);

namespace Telegram\utils;

class Internet {

    public function __construct(
        private readonly string $token
    ){}

    public function request(string $method, array $params = []): array{
        $url = "https://api.telegram.org/bot" . $this->token . "/" . $method;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type:multipart/form-data"
        ]);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($ch);
        if ($result === false) {
            throw new \Exception("Curl error: " . print_r(curl_error($ch), true));
        }

        curl_close($ch);
        return json_decode($result, true);
    }
}