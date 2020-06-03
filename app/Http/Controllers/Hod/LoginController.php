<?php

namespace App\Http\Controllers\Hod;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:hod')->except('logout', 'hodLogout');
    }

    public function showLoginForm() {
        return view('hods.auth.login');
    }

    public function lecturerLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // attempt to log the user in
        if (Auth::guard('hod')->attempt($credentials, $request->remember)) {
            // if successful, then redirect to their intended locations
            return redirect()->intended(route('hod.dashboard'));
        }

        // if unsuccessful, then redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function hodLogout() {
        Auth::guard('hod')->logout();

        return redirect()->route('hod.login')->with('info', 'You are logged out.');
    }
}
