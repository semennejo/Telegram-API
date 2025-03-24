<?php

declare(strict_types=1);

namespace Telegram\types;

readonly class Audio {
    public static function create(array $input): self {
        return new self(
            $input["file_id"],
            $input["file_unique_id"],
            $input["duration"],
            $input["performer"] ?? null,
            $input["title"] ?? null,
            $input["file_name"] ?? null,
            $input["mime_type"] ?? null,
            $input["file_size"] ?? null,
            isset($input["thumbnail"]) ? PhotoSize::create($input["thumbnail"]) : null
        );
    }

    public function __construct(
        private int $fileId,
        private string $fileUniqueId,
        private int $duration,
        private ?string $performer,
        private ?string $title,
        private ?string $fileName,
        private ?string $mimeType,
        private ?int $fileSize,
        private ?PhotoSize $thumbnail
    ){}

    public function getFileId(): int {
        return $this->fileId;
    }

    public function getFileUniqueId(): string {
        return $this->fileUniqueId;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getPerformer(): ?string {
        return $this->performer;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function getFileName(): ?string {
        return $this->fileName;
    }

    public function getMimeType(): ?string {
        return $this->mimeType;
    }

    public function getFileSize(): ?int {
        return $this->fileSize;
    }

    public function getThumbnail(): ?PhotoSize {
        return $this->thumbnail;
    }
}