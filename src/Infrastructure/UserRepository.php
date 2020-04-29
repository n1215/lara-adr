<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Infrastructure;

use Illuminate\Support\Collection;
use N1215\LaraAdr\Domains\User;
use N1215\LaraAdr\Domains\UserId;
use N1215\LaraAdr\Domains\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var Collection|User[]
     */
    private $users;

    /**
     * コンストラクタ
     *
     * @param Collection $users
     */
    public function __construct(Collection $users)
    {
        $this->users = collect();

        foreach ($users as $user) {
            $this->addUser($user);
        }
    }

    /**
     * ユーザーを追加
     *
     * @param User $user
     */
    private function addUser(User $user): void
    {
        $this->users->push($user);
    }

    /**
     * @inheritDoc
     */
    public function find(UserId $userId): ?User
    {
        return $this->users->first(
            function (User $user) use ($userId): bool {
                return $user->getId()->getValue() === $userId->getValue();
            }
        );
    }
}
