<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Console\Responders;

use N1215\LaraAdr\Domains\User;
use Illuminate\Console\OutputStyle;

class UserShowConsoleResponder
{
    /**
     * @var OutputStyle
     */
    private $output;

    public function __construct(OutputStyle $output)
    {
        $this->output = $output;
    }

    public function respond(User $user = null): void
    {
        if ($user === null) {
            $this->output->error('ユーザーが見つかりません');
            return;
        }

        $this->output->success(json_encode($user));
    }
}
