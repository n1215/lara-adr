<?php

namespace App\Domains\Users;

class UserId
{
    /**
     * @var int
     */
    private $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * 文字列に変換
     */
    public function __toString(): string
    {
        return strval($this->userId);
    }

    /**
     * スカラー値を取得
     */
    public function getValue(): int
    {
        return $this->userId;
    }
}