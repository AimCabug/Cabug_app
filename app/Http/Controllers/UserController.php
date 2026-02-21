<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    //
    public function show() {
        $user = [
            [
                'SERVICE' => 'CONTROLLER',
                'name' => 'Aim Cabug',
                'gender' => 'Male'
            ],
            [
                'name' => 'Aimy Cabug',
                'gender' => 'Female'
            ]
        ];
        return response($user);
    }
    public function index(UserService $userService) {
        return $userService->listUsers();
    }

    public function first(UserService $userService) {
        return collect($userService -> listUsers()) ->first();
    }

    public function get(UserService $userService, $id) {
        $user = collect($userService->listUsers())->firstWhere('id', (int) $id);

        if ($user === null) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }
}
