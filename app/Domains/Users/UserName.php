<?php

namespace App\Domains\Users;

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