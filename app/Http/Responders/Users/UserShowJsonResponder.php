<?php

namespace App\Http\Responders\Users;


use App\Domains\Users\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;

class UserShowJsonResponder
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function respond(User $user = null): JsonResponse
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