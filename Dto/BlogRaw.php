<?php

final class BlogRaw
{
    private $id;
    private $userId;
    private $title;
    private $contents;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        int $id,
        string $userId,
        string $title,
        string $contents,
        string $createdAt,
        string $updatedAt
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->contents = $contents;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function contents(): string
    {
        return $this->contents;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function updatedAt(): string
    {
        return $this->updatedAt;
    }
}