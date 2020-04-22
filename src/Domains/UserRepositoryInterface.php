<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Domains;

interface UserRepositoryInterface
{
    /**
     * IDを指定してユーザーを取得
     *
     * @param UserId $userId
     * @return User|null
     */
    public function find(UserId $userId) : ?User;
}
