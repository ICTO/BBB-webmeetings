<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Cas;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Logout the current user
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        Cas::logout(['service' => url('/'), 'url' => url('/')]);
    }
}
