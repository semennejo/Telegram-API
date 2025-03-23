<?php

declare(strict_types=1);

namespace Telegram;

use Telegram\types\Chat;
use Telegram\types\User;

readonly class Message {

    private array $input;

    private int $messageId;
    private ?int $messageThreadId;
    private ?User $from;
    private ?Chat $senderChat;
    private ?int $senderBoostCount;
    private ?User $senderBusinessBot;
    private int $date;
    private string $businessConnectionId;
    private ?Chat $chat;

    public function __construct(
        private Telegram $telegram
    ){
        $this->input = $this->telegram->getInput()["message"];

        $this->messageId = $this->input["message_id"];
        $this->messageThreadId = $this->input["message_thread_id"] ?? null;
        $this->from = isset($this->input["from"]) ? User::create($this->input["from"]) : null;
        $this->senderChat = isset($this->input["sender_chat"]) ? Chat::create($this->input["sender_chat"]) : null;
        $this->senderBoostCount = $this->input["sender_boost_count"] ?? null;
        $this->senderBusinessBot = isset($this->input["sender_business_bot"]) ? User::create($this->input["sender_business_bot"]) : null;
        $this->date = $this->input["date"];
        $this->businessConnectionId = $this->input["business_connection_id"] ?? null;
        $this->chat = isset($this->input["chat"]) ? Chat::create($this->input["chat"]) : null;
    }

    public function getMessageId() : int {
        return $this->messageId;
    }

    public function getMessageThreadId() : ?int {
        return $this->messageThreadId;
    }

    public function getFrom() : ?User {
        return $this->from;
    }

    public function getSenderChat() : ?Chat {
        return $this->senderChat;
    }

    public function getSenderBoostCount() : ?int {
        return $this->senderBoostCount;
    }

    public function getSenderBusinessBot() : ?User {
        return $this->senderBusinessBot;
    }

    public function getDate() : int {
        return $this->date;
    }

    public function getBusinessConnectionId() : ?string {
        return $this->businessConnectionId;
    }

    public function getChat() : ?Chat {
        return $this->chat;
    }

    //TODO:
}