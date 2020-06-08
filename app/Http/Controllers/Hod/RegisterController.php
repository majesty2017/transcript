<?php

namespace App\Http\Controllers\Hod;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        return view('admins.auth.register');
    }

    public function adminRegister(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:admins|max:100',
            'username' => 'required|unique:admins|max:100',
            'password' => 'required|same:password_confirmation|min:6',
        ]);

        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->username = $request->input('username');
        $admin->password = bcrypt($request->input('password'));

        $admin->save();

        return redirect()->route('admin.login')->with('info', 'You have been registered.');
    }
}
