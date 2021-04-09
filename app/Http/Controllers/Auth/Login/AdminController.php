<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

class AdminController extends LoginController
{
    protected $redirectTo = '/admin/home';

	public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

	public function showLoginForm()
    {
        return view('admin.login');
    }

	public function username()
    {
        return 'email';
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}