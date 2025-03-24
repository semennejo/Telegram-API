<?php

declare(strict_types=1);

namespace Telegram\types\messageOrigin;

class MessageOriginHiddenUser extends MessageOrigin {

    public static function create(array $input): self{
        return new self(
            $input["type"],
            $input["date"],
            $input["sender_user_name"]
        );
    }

    private string $senderUserName;

    public function __construct(string $type, int $date, string $senderUserName){
        parent::__construct($type, $date);
        $this->senderUserName = $senderUserName;
    }

    public function getSenderUserName(): string {
        return $this->senderUserName;
    }
}