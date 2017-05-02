<?php

namespace App\Domains\Users;


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

    /**
     * User constructor.
     * @param UserId $userId
     * @param UserName $userName
     */
    public function __construct(UserId $userId, UserName $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    /**
     * ユーザー名を取得
     * @return UserName
     */
    public function getName()
    {
        return $this->userName;
    }

    /**
     * ユーザーIDを取得
     * @return UserId
     */
    public function getId()
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $rawId = $this->userId->getValue();
        $rawName = $this->userName->getValue();

        return [
            'id' => $rawId,
            'name' => $rawName,
        ];
    }
}