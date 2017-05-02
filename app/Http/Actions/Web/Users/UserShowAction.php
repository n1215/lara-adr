<?php

namespace App\Http\Actions\Web\Users;

use App\Http\Responders\Users\UserShowHtmlResponder;
use App\Domains\Users\UserShowUseCase;

class UserShowAction
{
    /**
     * @var UserShowUseCase
     */
    private $useCase;

    /**
     * @var UserShowHtmlResponder
     */
    private $responder;

    /**
     * UserShowAction constructor.
     * @param UserShowUseCase $useCase
     * @param UserShowHtmlResponder $responder
     */
    public function __construct(UserShowUseCase $useCase, UserShowHtmlResponder $responder)
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