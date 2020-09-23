<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function store(Request $request)
    {
        //logging out first if auth user
        if (auth()->user()) {
            Alert::info('You were logged out!')->toToast();
            Auth::logout(auth()->user());
        }

        $validator = Validator::make($request->only('email', 'password'), [
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
            //putting default values in user info


            if ($newUser->save()) {
                $newUserInfo = new UserInfo;
                $newUserInfo->user_id = $newUser->id;
                $newUserInfo->profile_img = 'img/changeprofile.png';
                $newUserInfo->fullname = $username;
                $newUserInfo->user_type = 1;
                $newUserInfo->location = 'Not specified';
                $newUserInfo->save();
                Auth::login($newUser);
                return redirect()->route('page', 'user-profile');
            } else {
                return redirect()->back();
            }
        } else {
            //user exists
            if (Hash::check(request()->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('page', 'user-profile');
            } else {
                Alert::warning('Incorrect password')->toToast();
                return redirect('/login')->withInput();
            }
        }
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
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
}
