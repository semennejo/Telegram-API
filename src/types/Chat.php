<?php

declare(strict_types=1);

namespace Telegram\types;

readonly class Chat {

    public static function create(array $input): self {
        return new self(
            $input["id"],
            $input["type"],
            $input["title"] ?? null,
            $input["username"] ?? null,
            $input["first_name"] ?? null,
            $input["isForm"] ?? null,
            $input["title"] ?? null
        );
    }

    public function __construct(
        private int $id,
        private string $type,
        private ?string $title,
        private ?string $username,
        private ?string $first_name,
        private ?string $last_name,
        private ?bool $isForum
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getFirstName(): string {
        return $this->first_name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function isForum(): bool {
        return $this->isForum;
    }
}