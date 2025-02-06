<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Flasher\Laravel\Facade\Flasher;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            Flasher::addSuccess('Welcome back!');
            return redirect()->route('admin.notifications');
        }
        Flasher::addError('Wrong username or password. Please try again.');
        return redirect()->back()->withInput();
    }
}
