<?php

declare(strict_types=1);

namespace Telegram\types\messageOrigin;

use Telegram\types\Chat;

class MessageOriginChat extends MessageOrigin {

    public static function create(array $input): self{
        return new self(
            $input["type"],
            $input["date"],
            Chat::create($input["sender_chat"]),
            $input["author_signature"],
        );
    }

    private Chat $senderChat;
    private string $authorSignature;

    public function __construct(string $type, int $date, Chat $senderChat, string $authorSignature){
        parent::__construct($type, $date);
        $this->senderChat = $senderChat;
        $this->authorSignature = $authorSignature;
    }

    public function getSenderChat(): Chat{
        return $this->senderChat;
    }

    public function getAuthorSignature(): string{
        return $this->authorSignature;
    }
}