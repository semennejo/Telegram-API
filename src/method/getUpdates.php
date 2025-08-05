<?php

declare(strict_types=1);

namespace Telegram\method;

readonly class getUpdates {

    public function __construct(
        private ?int $offset,
        private ?int $limit,
        private ?int $timeout,
        private null|array|string $allowed_updates
    ) {}

    public function toArray() : array {
        return [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'timeout' => $this->timeout,
            'allowed_updates' => $this->allowed_updates,
        ];
    }

}