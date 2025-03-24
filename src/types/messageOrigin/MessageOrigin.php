<?php

declare(strict_types=1);

namespace Telegram\types\messageOrigin;

abstract class MessageOrigin {

    public function __construct(
        private string $type,
        private int $date
    ){}

    public function getType(): string {
        return $this->type;
    }

    public function getDate(): int {
        return $this->date;
    }
}