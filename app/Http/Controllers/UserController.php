<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Cas;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        Session::flush();
        Cas::logout(['service' => url('/')]);
    }
}
