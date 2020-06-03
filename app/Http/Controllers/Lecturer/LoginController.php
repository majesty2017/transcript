<?php

namespace App\Http\Controllers\Lecturer;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:lecturer')->except('logout', 'lecturerLogout');
    }

    public function showLoginForm() {
        return view('lecturers.auth.login');
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
        if (Auth::guard('lecturer')->attempt($credentials, $request->remember)) {
            // if successful, then redirect to their intended locations
            return redirect()->intended(route('lecturer.dashboard'));
        }

        // if unsuccessful, then redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function lecturerLogout() {
        Auth::guard('lecturer')->logout();

        return redirect()->route('lecturer.login')->with('info', 'You are logged out.');
    }
}
