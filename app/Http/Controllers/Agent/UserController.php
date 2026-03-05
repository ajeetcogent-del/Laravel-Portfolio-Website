<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Agent can view all users
        $users = User::all();
        return view('agent.users.index', compact('users'));
    }
}
