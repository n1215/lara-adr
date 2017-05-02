<?php

namespace App\Http\Actions\Api\Users;

use App\Http\Responders\Users\UserShowJsonResponder;
use App\Domains\Users\UserShowUseCase;
use Illuminate\Http\JsonResponse;

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

    public function __construct(UserShowUseCase $useCase, UserShowJsonResponder $responder)
    {
        $this->useCase = $useCase;
        $this->responder = $responder;
    }

    public function __invoke(string $userId): JsonResponse
    {
        $user = $this->useCase->run(intval($userId));
        return $this->responder->respond($user);
    }
}