<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Http\Responders;

use N1215\LaraAdr\Domains\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Routing\ResponseFactory;

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
        if ($user === null) {
            return $this->responseFactory->json(
                [
                    'error' => [
                        'type' => 'not_found',
                        'message' => '見つかりません',
                    ],
                ],
                404
            );
        }

        return $this->responseFactory->json($user, 200);
    }
}
