<?php

namespace App\Http\Actions\Api\Users;

use App\Http\Responders\Users\UserShowJsonResponder;
use App\Domains\Users\UserShowUseCase;

class UserShowAction
{
    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * @var UserShowJsonResponder
     */
    private $responder;

    /**
     * UserShowAction constructor.
     * @param UserShowUseCase $useCase
     * @param UserShowJsonResponder $responder
     */
    public function __construct(UserShowUseCase $useCase, UserShowJsonResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    /**
     * @param int $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($userId)
    {
        $user = $this->useCase->run($userId);
        return $this->responder->respond($user);
    }
}