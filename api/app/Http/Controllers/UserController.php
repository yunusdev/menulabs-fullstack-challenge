<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
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

    public function show(User $user): JsonResponse
    {
        $user->load('weather');

        return response()->json([
            'message' => 'User weather fetched successfully!',
            'user' => new UserResource($user),
        ]);
    }
}
