<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Boss;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = Boss::get();
        return response()->json([$users]);
    }
}
