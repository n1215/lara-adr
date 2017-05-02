<?php

namespace App\Http\Responders\Users;


use App\Domains\Users\User;
use Illuminate\Routing\ResponseFactory;

class UserShowJsonResponder
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * UserShowJsonResponder constructor.
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param User|null $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond(User $user = null)
    {
        if(is_null($user)) {
            return $this->responseFactory->json([
                'error' => [
                    'type' => 'not_found',
                    'message' => '見つかりません',
                ],
            ], 404);
        }

        return $this->responseFactory->json($user, 200);
    }
}