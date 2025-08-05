<?php

declare(strict_types=1);

namespace Telegram\types;

readonly class User {

    public static function create(array $input): self {
        return new self(
            $input["id"],
            $input["is_bot"],
            $input["first_name"],
            $input["last_name"] ?? null,
            $input["username"] ?? null,
            $input["language_code"] ?? null,
            $input["is_premium"] ?? null,
            $input["added_to_attachment_menu"] ?? null,
            $input["can_join_groups"] ?? null,
            $input["can_read_all_group_messages"] ?? null,
            $input["supports_inline_queries"] ?? null,
            $input["can_connect_to_business"] ?? null,
            $input["has_main_web_app"] ?? null
        );
    }

    public function __construct(
        private int $id,
        private bool $isBot,
        private string $firstName,
        private ?string $lastName,
        private ?string $username,
        private ?string $languageCode,
        private ?true $isPremium,
        private ?true $addedToAttachmentMenu,
        private ?bool $canJoinGroups,
        private ?bool $canReadAllGroupMessages,
        private ?bool $supportsInlineQueries,
        private ?bool $canConnectToBusiness,
        private ?bool $hasMainWebApp,
    ){}

    public function getId(): int {
        return $this->id;
    }

    public function isBot(): bool {
        return $this->isBot;
    }

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): ?string {
        return $this->lastName;
    }

    public function getUsername(): ?string {
        return $this->username;
    }

    public function getLanguageCode(): ?string {
        return $this->languageCode;
    }

    public function isPremium(): bool {
        return $this->isPremium;
    }

    public function getAddedToAttachmentMenu(): ?bool {
        return $this->addedToAttachmentMenu;
    }

    public function getCanJoinGroups(): bool {
        return $this->canJoinGroups;
    }

    public function getCanReadAllGroupMessages(): ?bool {
        return $this->canReadAllGroupMessages;
    }

    public function getSupportsInlineQueries(): bool {
        return $this->supportsInlineQueries;
    }

    public function getCanConnectToBusiness(): bool {
        return $this->canConnectToBusiness;
    }

    public function getHasMainWebApp(): bool {
        return $this->hasMainWebApp;
    }
}