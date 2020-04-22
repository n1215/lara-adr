<?php

use Illuminate\Support\Facades\Route;

Route::get('/users/{userId}', \N1215\LaraAdr\Http\Actions\WebUserShowAction::class);
Route::get('/api/users/{userId}', \N1215\LaraAdr\Http\Actions\ApiUserShowAction::class);
