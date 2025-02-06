<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only('logout_system');
    }
    public function logout_system()
    {
        if (auth()->check()) {
            auth()->logout();
        }
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');

    }
}
