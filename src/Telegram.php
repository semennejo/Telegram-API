<?php

declare(strict_types=1);

namespace Telegram;

use Telegram\method\Method;
use Telegram\types\Message;
use Telegram\utils\Internet;
use Telegram\utils\Utils;

readonly class Telegram {
    private Internet $internet;

    public function __construct(
        private string $token,
        private array $input
    ){
        $this->internet = new Internet($token);
    }

    public function getToken() : string {
        return $this->token;
    }

    public function getInput() : array {
        return $this->input;
    }

    public function sendMethod(Method $method, bool $clean = true) : void {
        $array = $method->toArray();

        if ($clean) {
            Utils::cleanArray($array);
        }

        $this->internet->request($method->getName(), $array);
    }

    public function getInternet() : Internet {
        return $this->internet;
    }

    public function getMessage() :  ?Message {
        return $this->isMessage() ? new Message($this->input['message']) : null;
    }

    public function isMessage() : bool {
        return isset($this->input['message']);
    }
}