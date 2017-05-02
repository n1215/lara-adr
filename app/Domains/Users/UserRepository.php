<?php

namespace App\Domains\Users;

use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var Collection|User[]
     */
    private $users;

    public function __construct(Collection $users)
    {
        $this->users = collect();

        foreach($users as $user) {
            $this->addUser($user);
        }
    }

    /**
     * ユーザーを追加
     */
    private function addUser(User $user): void
    {
        $this->users->push($user);
    }

    /**
     * IDを指定してユーザーを取得
     */
    public function find(UserId $userId): ?User
    {
        return $this->users->first(function(User $user) use ($userId) {

            return $user->getId()->getValue() === $userId->getValue();
        });
    }
}