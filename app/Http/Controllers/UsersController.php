<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boss;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = Boss::get();
        return response()->json($users);
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => 'nullable|string',
            'name' => 'nullable|string',
            'pid' => 'numeric|exists:bosses,id',
        ]);

        $user = new User();
        $user->title = $req->title;
        $user->name = $req->name;
        $user->pid = $req->pid;

        $user->save();
        return response()->json(['user' => $user]);
    }

    public function delete($id)
    {
        $userId = User::where('id', $id)->value('id');
        if (!$userId) {
            return response()->json(['error' => 'User not found'], 400);
        } else {
            User::destroy($userId);
            return response()->json(['message' => 'User deleted']);
        }
    }
}
