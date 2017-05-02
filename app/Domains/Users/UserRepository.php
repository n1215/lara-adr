<?php

namespace App\Domains\Users;


use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var Collection|User[]
     */
    private $users;

    /**
     * UserRepository constructor.
     * @param Collection $users
     */
    public function __construct(Collection $users)
    {
        $this->users = collect();

        foreach($users as $user)
        {
            $this->addUser($user);
        }
    }

    /**
     * ユーザーを追加
     * @param User $user
     */
    private function addUser(User $user)
    {
        $this->users->push($user);
    }

    /**
     * IDを指定してユーザーを取得
     * @param UserId $userId
     * @return User|null
     */
    public function find(UserId $userId)
    {
        return $this->users->first(function(User $user) use ($userId) {

            return $user->getId()->getValue() === $userId->getValue();
        });
    }
}