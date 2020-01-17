<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\User;
use Auth;
use Mail;

class CustomAuthController extends Controller
{
    //
    public function registerPage()
    {
        return view('register');
    }

    public function register(RegistrationRequest $request)
    {
        $input = $request->all();
        $password = bcrypt($request->input('password'));
        $input['password'] = $password;
        $input['activation_code'] = str_random(60) . $request->input('email');
        $register = User::create($input);
        
        $data = [
            'name' => $input['name'],
            'code' => $input['activation_code']
        ];
        $this->sendEmail($data, $input);
        return redirect()->route('loginv');
    }

    public function sendEmail($data, $input)
    {
        Mail::send('emails.register', $data, function($message) use ($input) {
        
            $message->from('admin@cardealer-indonesia.com', 'Admin-CarDealer');
            $message->to($input['email'], $input['name'])->subject('Please verify your account registration!');
        
        });
    }

    public function activate($code, User $user)
    {
        if ($user->activateAccount($code)) {
            return redirect()->route('loginv')->with('success', 'Your account has been activated!');
        }
        return redirect()->route('loginv')->with('error', 'Your account activation fails!');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            if (Auth::user()->active == 0) {
                Auth::logout();
                return redirect()->route('loginv')->with('error', 'Please activate your account');
            }
            else {
                return redirect()->route('home');
                //return 'You have been log in';
            }
        }
        else {
            return redirect()->route('loginv')->with('error', 'The username and password do not match');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginv');
    }
}
