<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Domains;

class UserName
{
    /**
     * @var string
     */
    private $userName;

    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * 文字列に変換
     */
    public function __toString() : string
    {
        return strval($this->userName);
    }

    /**
     * スカラー値を取得
     */
    public function getValue() : string
    {
        return $this->userName;
    }
}