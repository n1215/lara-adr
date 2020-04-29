<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Domains;

class UserId
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * 文字列に変換
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }

    /**
     * スカラー値を取得
     */
    public function getValue(): int
    {
        return $this->value;
    }
}