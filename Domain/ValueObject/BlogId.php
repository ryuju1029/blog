<?php

final class BlogId
{
    private $value;

    public function __construct(int $value)
    {
        if ($value <= 0) {
            throw new Exception('blog_idは1以上を指定してください');
        }
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}