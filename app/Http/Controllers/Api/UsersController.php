<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;

class UsersController extends Controller
{
    public function index()
    {
        return new UserCollection(User::paginate(5));
    }
}
