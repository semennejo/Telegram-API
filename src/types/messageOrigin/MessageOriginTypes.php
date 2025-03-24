<?php

declare(strict_types=1);

namespace Telegram\types\messageOrigin;

class MessageOriginTypes {

    public function __construct(){
        //NOOP
    }

    public const USER = "user";
    public const HIDDEN_USER = "hidden_user";
    public const CHAT = "chat";
    public const CHANNEL = "channel";

}