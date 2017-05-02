<?php

namespace App\Domains\Users;

interface UserRepositoryInterface
{
    /**
     * IDを指定してユーザーを取得
     * @param UserId $userId
     * @return User|null
     */
    public function find(UserId $userId);
}