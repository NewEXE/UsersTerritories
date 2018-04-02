<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @param null $email
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $email = null)
    {
        if ($email)
        {
            $user = User::where('email', $request->email)->firstOrFail();
            $territory = Territory::findOrFail($user->territory);

            return view('user', compact('user', 'territory'));
        }

        $users = User::with('territory')->simplePaginate(User::PER_PAGE);
        return view('user-list', compact('users'));

    }
}
