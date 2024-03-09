<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class AuthController extends Controller
{
    public function login_page()
    {
        return view('auth/admins/login');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $validation_rules = [
            'email' => 'required|email',
            'password' => 'required|max:32',
        ];
        $validator = Validator::make($request->all(), $validation_rules);
        if ($validator->fails()) {
            if ($request->ajax()) {
                return Response::json(['status' => false, 'errors' => $validator->errors()]);
            } else {
                return Redirect()->back()->with(['status' => false, 'errors' => $validator->errors()]);
            }
        }
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if (Hash::check($request->password, $user->password)) {
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']), isset($request->remember_me)) && auth()->user()->role == 'admin') {
                $request->session()->regenerate();
                return Response::json([
                    'status' => true,
                    'message' => 'You are successfully logged in.'
                ]);
            }else {
                return Response::json([
                    'status' => false,
                    'message' => 'User name or password error!'
                ]);
            }
        }else{
            return Response::json([
                'status' => false,
                'message' => "Password Error!."
            ]);
        }
      
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::route('login-page')->with([
            'status' => true,
            'message' => 'You have been logged out successfully.'
        ]);
    }

}


