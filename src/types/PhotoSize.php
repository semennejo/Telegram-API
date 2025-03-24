<?php

declare(strict_types=1);

namespace Telegram\types;

readonly class PhotoSize {

    public static function create(array $input): self {
        return new self(
            $input["file_id"],
            $input["file_unique_id"],
            $input["width"],
            $input["height"],
            $input["file_size"] ?? null
        );
    }

    public function __construct(
        private int $fileId,
        private string $fileUniqueId,
        private int $width,
        private int $height,
        private ?int $fileSize
    ){}

    public function getFileId(): int {
        return $this->fileId;
    }

    public function getFileUniqueId(): string {
        return $this->fileUniqueId;
    }

    public function getWidth(): int {
        return $this->width;
    }

    public function getHeight(): int {
        return $this->height;
    }

    public function getFileSize(): ?int {
        return $this->fileSize;
    }
}