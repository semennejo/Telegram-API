<?php

declare(strict_types=1);

namespace Telegram\types\messageOrigin;

use Telegram\types\Chat;

class MessageOriginChannel extends MessageOrigin {

    public static function create(array $input): self{
        return new self(
            $input["type"],
            $input["date"],
            Chat::create($input["chat"]),
            $input["message_id"],
            $input["author_signature"],
        );
    }

    private Chat $chat;
    private int $messageId;
    private string $authorSignature;

    public function __construct(string $type, int $date, Chat $chat, int $messageId, string $authorSignature){
        parent::__construct($type, $date);
        $this->chat = $chat;
        $this->messageId = $messageId;
        $this->authorSignature = $authorSignature;
    }

    public function getChat(): Chat{
        return $this->chat;
    }

    public function getMessageId(): int{
        return $this->messageId;
    }

    public function getAuthorSignature(): string{
        return $this->authorSignature;
    }
}