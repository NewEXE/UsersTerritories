<?php

namespace App\Http\Controllers\Auth;

use App\Models\Territory;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers
    {
        register as traitRegister;
        showRegistrationForm as traitShowRegistrationForm;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|min:6|max:255',
            'email' => 'required|string|email|max:255',
            'territory' => 'required|exists:t_koatuu_tree,ter_id',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'territory' => $data['territory'],
        ]);
    }

    /**
     * @param $email
     * @return mixed
     */
    protected function emailExists($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $regions = Territory::regions()->get();

        return view('auth.register', compact('regions'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $email = $request->email;

        if ($user = $this->emailExists($email))
        {
            return redirect()->route('users', ['email' => $email])->with(['status' => __('register.already_registered')]);
        }

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect()->route('users', ['email' => $email])->with(['status' => __('register.new_user')]);
    }
}