<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Domains;

class User implements \JsonSerializable
{

    /**
     * @var UserId
     */
    private $userId;

    /**
     * @var UserName
     */
    private $userName;

    public function __construct(UserId $userId, UserName $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * ユーザー名を取得
     */
    public function getName() : UserName
    {
        return $this->userName;
    }

    /**
     * ユーザーIDを取得
     */
    public function getId() : UserId
    {
        return $this->userId;
    }

    /**
     * JSON用の配列に変換
     */
    public function jsonSerialize() : array
    {
        $rawId = $this->userId->getValue();
        $rawName = $this->userName->getValue();

        return [
            'id' => $rawId,
            'name' => $rawName,
        ];
    }
}