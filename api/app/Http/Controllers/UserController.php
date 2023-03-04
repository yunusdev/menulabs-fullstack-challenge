<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::query()->with('weather')->paginate(5);

        return response()->json([
            'message' => 'all systems are a go',
            'users' => new UserCollection($users),
        ]);
    }
}
