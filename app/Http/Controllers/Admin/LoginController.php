<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm() {
        return view('admins.auth.login');
    }

    public function adminLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // attempt to log the user in
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // if successful, then redirect to their intended locations
            return redirect()->intended(route('admin.dashboard'));
        }

        // if unsuccessful, then redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout() {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('info', 'You are logged out.');
    }
}
