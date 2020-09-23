<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //pages 
    public function __invoke($page)
    {
        // $metaTitle = __('Meta Title: ' . $page);
        // if ($metaTitle == 'Meta Title: ' . $page) {
        //     $metaTitle = NULL;
        // }

        $metaTitle = str_replace('-', ' ', ucwords($page));
        return view('real-estate.account.' . $page, compact('metaTitle'));
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
            return redirect()->route('page', 'user-profile')->with('toast_success', 'Account Updated!');
        } else {
            return redirect()->route('page', 'user-profile')->with('toast_warning', 'Unsuccessfull !');
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
            Storage::delete('public/user-profile-img/' . basename($userImg));
            $userInfo->profile_img = 'storage/user-profile-img/' . $fileNameToStore;

            if ($userInfo->save()) {
                Alert::success('Your profile image was updated!');
                return redirect()->route('page', 'user-profile');
            } else {
                return redirect()->back();
            }
        }
    }
}
