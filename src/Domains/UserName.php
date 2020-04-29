<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Domains;

class UserName
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * 文字列に変換
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * スカラー値を取得
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
