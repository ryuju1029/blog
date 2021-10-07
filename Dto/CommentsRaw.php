<?php

final class CommentsRaw
{
  private $id;
  private $userId;
  private $blogId;
  private $commenterName;
  private $createdAt;
  private $updatedAt;

  public function __construct(
    int $id,
    string $userId,
    string $blogId,
    string $commenterName,
    string $comments,
    string $createdAt,
    string $updatedAt
  ) {
    $this->id = $id;
    $this->userId = $userId;
    $this->blogId = $blogId;
    $this->commenterName = $commenterName;
    $this->comments = $comments;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
  }

  public function id(): int
  {
    return $this->id;
  }

  public function userId(): string
  {
    return $this->userId;
  }

  public function email(): string
  {
    return $this->blogId;
  }

  public function commenterName(): string
  {
    return $this->commenterName;
  }

  public function comments(): string
  {
    return $this->comments;
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
