<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use App\UserType;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            return view('auth.login');
        } else {
            return redirect('/login');
        }
    }
    public function accountLogout()
    {
        Auth::logout(auth()->user());
        return redirect()->route('login');
    }

    public function accountUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|min:4',
            'location' => 'required',
        ]);
        // $testUser = User::where('email', $request->email)->first();
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;

        $userInfo = $user->userInfo;
        $userInfo->fullname = $request->name;
        $userInfo->user_type = $request->user_type;
        $userInfo->location = $request->location;
        $userInfo->rental_inquiries = $request->rental ?? 0;

        if ($user->save() && $userInfo->save()) {
            return redirect()->route('user.account')->with('toast_success', 'Account Updated!');
        } else {
            return redirect()->route('user.account')->with('toast_warning', 'Unsuccessfull !');
        }
    }

    protected function passwordChange(Request $request)
    {
        //$2y$10$DOY6Gzj5cZ1nzwIavN81kesRTORnKnSDoQ4E58UF4XzOUFSHFloLK admin123

        if (auth()->user()) {
            $authUser = auth()->user();
            $currentP = $request->currentPassword;
            $newP = $request->newPassword;
            $confirmP = $request->confirmPassword;

            //check if the password is valid
            if (!$request->validate([
                'currentPassword' => 'required|min:8',
                'newPassword' => 'required|min:8'
            ])) {
                return ['passwordChange' => false, 'msg' => 'Invalid password'];
            }
            if (Hash::check($currentP, $authUser->password)) {
                if (Str::of($newP)->exactly($confirmP)) {
                    $user = User::find($authUser->id);
                    $user->password = Hash::make($newP);
                    if ($user->save()) {
                        return ['passwordChange' => true, 'msg' => 'Your password was changed!'];
                    } else {
                        return ['passwordChange' => false, 'msg' => ''];
                    }
                } else {
                    return ['passwordChange' => false, 'msg' => 'The new passwords doesn\'t match.'];
                }
            } else {
                return ['passwordChange' => false, 'msg' => 'Incorrect Password.'];
            }
        } else {
            return ['passwordChange' => false, 'msg' => 'Not authenticated!'];
        }
    }

    public function profileImgChange(Request $request)
    {
        $validator = Validator::make($request->all('profileImg'), [
            'profileImg' => 'required|image|max:8000'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('profileImg')) {
                Alert::error('Upload error!', $errors->first('profileImg'))->toToast();
            }
            return redirect()->back();
        } else {
            $fileName = $request->file('profileImg')->getClientOriginalName();
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $fileNameToStore = $actualFileName . time() . '.' . $fileExtension;
            $path = $request->file('profileImg')->storeAs('public/user-profile-img', $fileNameToStore);

            $user = User::find(auth()->user()->id);
            $userInfo = $user->userInfo;
            //delete existing old image
            $userImg = $userInfo->profile_img;
            Storage::delete('public/user-profile-img' . $userImg);
            $userInfo->profile_img = 'storage/user-profile-img/' . $fileNameToStore;

            if ($userInfo->save()) {
                Alert::success('Your profile image was updated!');
                return redirect()->route('user.account');
            } else {
                return redirect()->back();
            }
        }
    }

    //pages 
    public function __invoke($page)
    {
        $metaTitle = 'User Account';
        $user = auth()->user();
        $userTypes = UserType::all();
        $userType = UserType::find($user->userInfo->user_type);
        return view('real-estate.account.' . $page, compact('user', 'userTypes', 'userType', 'metaTitle'));
    }
}
