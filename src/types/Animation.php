<?php

declare(strict_types=1);

namespace Telegram\types;

readonly class Animation {
    public static function create(array $input): self {
        return new self(
            $input["file_id"],
            $input["file_unique_id"],
            $input["width"],
            $input["height"],
            $input["duration"],
            isset($input["thumbnail"]) ? PhotoSize::create($input["thumbnail"]) : null,
            $input["file_name"] ?? null,
            $input["mime_type"] ?? null,
            $input["file_size"] ?? null
        );
    }

    public function __construct(
        private int $fileId,
        private string $fileUniqueId,
        private int $width,
        private int $height,
        private int $duration,
        private ?PhotoSize $thumbnail,
        private ?string $file_name,
        private ?string $mime_type,
        private ?int $file_size
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

    public function getHeight(): int{
        return $this->height;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getThumbnail(): ?PhotoSize{
        return $this->thumbnail;
    }

    public function getFileName(): ?string {
        return $this->file_name;
    }

    public function getMimeType(): ?string {
        return $this->mime_type;
    }

    public function getFileSize(): ?int {
        return $this->file_size;
    }
}