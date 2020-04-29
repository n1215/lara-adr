<?php

declare(strict_types=1);

namespace N1215\LaraAdr\Console\Commands;

use N1215\LaraAdr\Console\Responders\UserShowConsoleResponder;
use N1215\LaraAdr\UseCase\UserShowUseCase;
use Illuminate\Console\Command;

class UserShowCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:show {userId : ユーザー} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ユーザー情報を表示';

    /**
     * @var UserShowUseCase
     */
    private $useCase;

    public function __construct(UserShowUseCase $useCase)
    {
        parent::__construct();
        $this->useCase = $useCase;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $userId = (int)$this->argument('userId');
        $user = $this->useCase->run($userId);

        $responder = new UserShowConsoleResponder($this->output);
        $responder->respond($user);
    }
}

