<?php

declare(strict_types=1);

namespace Telegram\method;

class SendMessage implements Method {

    public function __construct(
        public int $chatId,
        public string $text,
        public ?string $businessConnectionId = null,
        public ?int $messageThreadId = null,
        public ?string $parseMode = null
    ) {}

    public function getName() : string {
        return 'sendMessage';
    }

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