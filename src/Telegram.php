<?php

declare(strict_types=1);

namespace Telegram;

readonly class Telegram {

    private array $input;

    public function __construct(
        private string $token
    ){
        $this->input = json_decode(file_get_contents('php://input'), true);
    }

    public function getToken() : string {
        return $this->token;
    }

    public function getInput() : array {
        return $this->input;
    }

    public function getUpdateId() : int {
        return $this->input['update_id'];
    }

    public function getMessage() :  ?Message {
        return $this->isMessage() ? new Message($this->input) : null;
    }

    public function isMessage() : bool {
        return isset($this->input['message']);
    }
}