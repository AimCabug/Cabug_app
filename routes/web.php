<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Services\UserService;

// Home Route
Route::get('/', function () {
    return 'hello, werld';
});

// Service Controller
Route::get('/show-users', [UserController::class, 'show']);

// Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

// Service Providers
Route::get('test-service', function(UserService $userService) {
    return $userService->listUsers();
});

// Service Provider
Route::get('/test-users', [UserController::class, 'index']);

// Service Facade
Route::get('test-facade', function(UserService $userService)
{
    return Response::json($userService->listUsers());
});

