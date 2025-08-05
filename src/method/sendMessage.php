<?php

declare(strict_types=1);

namespace Telegram\method;

readonly class sendMessage {

    public function __construct(
        private ?string $businessConnectionId,
        private int $chatId,
        private ?int $messageThreadId,
        private string $text,
        private ?string $parseMode
    ) {}

    public function toArray() : array {
        return [
            'business_connection_id' => $this->businessConnectionId,
            'chat_id' => $this->chatId,
            'message_thread_id' => $this->messageThreadId,
            'text' => $this->text,
            'parse_mode' => $this->parseMode
        ];
    }

}