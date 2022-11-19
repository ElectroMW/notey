<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Throwable;

class User extends BaseController
{
    protected array $register_validation_rules = [
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'max:255'],
        'name' => ['required', 'string', 'min:1', 'max:255']
    ];

    public function getLogin(): View|Factory|RedirectResponse|Application
    {
        if (Auth::user()) {
            return Redirect::route('index');
        }
        return view('login');
    }


    public function postLogin(Request $request): View|Factory|RedirectResponse|Application
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return Redirect::route('index');
        }
        return view('login')->with(['error' => 'Invalid credentials']);
    }

    public function postLogout(): RedirectResponse
    {
        Auth::logout();
        return Redirect::route('login');
    }

    public function getRegister(): View|Factory|RedirectResponse|Application
    {
        if (Auth::user()) {
            return Redirect::route('index');
        }

        return view('register');
    }

    /**
     * @throws Throwable
     */
    public function postRegister(Request $request): View|Factory|RedirectResponse|Application
    {
        $validator = Validator::make($request->only(['email', 'password', 'name']), $this->register_validation_rules);
        if ($validator->fails()) {
            return view('register')->with(['error_messages' => $validator->getMessageBag()->all()]);
        }

        $user = new UserModel([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name')
        ]);
        $user->saveOrFail();

        Auth::login($user);
        return Redirect::route('index');
    }
}
