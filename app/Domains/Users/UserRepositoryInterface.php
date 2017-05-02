<?php

namespace App\Domains\Users;

interface UserRepositoryInterface
{
    /**
     * IDを指定してユーザーを取得
     */
    public function find(UserId $userId) : ?User;
}