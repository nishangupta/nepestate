<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //user who clicks submit btn get logged out
        if (auth()->user()) {
            Auth::logout(auth()->user());
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                Alert::warning('Please use valid Email !', $errors->first('email'))->toToast();
            } else {
                Alert::warning('Please use a valid Password !', $errors->first('password'))->toToast();
            }
            return redirect('/login')->withInput();
        }

        //if the validation passes
        $user = User::where('email', '=', request()->email)->first();
        if ($user === null) {
            $username = explode("@", request()->email)[0];

            $newUser = new User;
            $newUser->name = $username;
            $newUser->email = request()->email;
            $newUser->password = Hash::make(request()->password);

            if ($newUser->save()) {
                return redirect()->route('user.account');
            } else {
                return redirect()->back();
            }
        } else {
            //user exists
            if (Hash::check(request()->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('user.account');
            } else {
                Alert::warning('Incorrect password')->toToast();
                return redirect('/login')->withInput();
            }
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function accountLogin()
    {
        if (auth()->user()) {
            Alert::toast();
            return view('auth.login')->with('success', 'Do you want to logout');
        } else {
            return redirect('/login');
        }
    }
    public function accountLogout()
    {
        Auth::logout(auth()->user());
        return redirect()->route('login');
    }
    public function accountIndex()
    {
        return view('real-estate.account-index');
    }
    public function accountRentalResume()
    {
        return view('real-estate.account-rental-resume');
    }
    public function savedHomes()
    {
        return view('real-estate.saved-homes');
    }
}
