<?php

declare(strict_types=1);

namespace Telegram;

use Telegram\method\Method;
use Telegram\types\Message;
use Telegram\utils\Internet;

readonly class Telegram {

    private Method $method;
    private Internet $internet;

    public function __construct(
        private string $token,
        private array $input
    ){
        $this->internet = new Internet($token);
        $this->method = new Method($this);
    }

    public function getToken() : string {
        return $this->token;
    }

    public function getInput() : array {
        return $this->input;
    }

    public function getMethod() : Method {
        return $this->method;
    }

    public function getInternet() : Internet {
        return $this->internet;
    }

    public function getUpdateId() : int {
        return $this->input['update_id'];
    }

    public function getMessage() :  ?Message {
        return $this->isMessage() ? new Message($this->input['message']) : null;
    }

    public function isMessage() : bool {
        return isset($this->input['message']);
    }
}