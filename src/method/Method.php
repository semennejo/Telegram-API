<?php

declare(strict_types=1);

namespace Telegram\method;

use Telegram\Telegram;
use Telegram\utils\Internet;

class Method {

    private Internet $internet;

    public function __construct(
        private Telegram $telegram
    ) {
        $this->internet = $this->telegram->getInternet();
    }

    public function sendMessage(sendMessage $sendMessage) : array {
        $array = $sendMessage->toArray();
        $this->clearArray($array);
        return $this->internet->request("sendMessage", $array);
    }

    public function getUpdates(getUpdates $getUpdates) : array {
        $array = $getUpdates->toArray();
        $this->clearArray($array);
        return $this->internet->request("sendMessage", $array);
    }

    private function clearArray(array &$array) : void {
        foreach ($array as $key => $value) {
            if ($value === null) {
                unset($array[$key]);
            }
        }
    }
}