<?php

declare(strict_types=1);

namespace Telegram\types\messageOrigin;

use Telegram\types\User;

class MessageOriginUser extends MessageOrigin {

    public static function create(array $input): self{
        return new self(
            $input["type"],
            $input["date"],
            User::create($input["sender_user"])
        );
    }

    private User $senderUser;

    public function __construct(string $type, int $date, User $senderUser){
        parent::__construct($type, $date);
        $this->senderUser = $senderUser;
    }

    public function getSenderUser(): User {
        return $this->senderUser;
    }
}