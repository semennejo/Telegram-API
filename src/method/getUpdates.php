<?php

declare(strict_types=1);

namespace Telegram\method;

class GetUpdates implements Method {

    public function __construct(
        public ?int $offset = null,
        public ?int $limit = null,
        public ?int $timeout = null,
        public null|array|string $allowed_updates = null
    ) {}

    public function getName() : string {
        return 'getUpdates';
    }

    public function toArray() : array {
        return [
            'offset' => $this->offset,
            'limit' => $this->limit,
            'timeout' => $this->timeout,
            'allowed_updates' => $this->allowed_updates,
        ];
    }
}