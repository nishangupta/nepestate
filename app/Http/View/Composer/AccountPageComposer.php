<?php

namespace App\Http\View\Composer;

use Illuminate\View\View;
use App\UserType;

class AccountPageComposer
{
  public function compose(View $view)
  {
    $user = auth()->user();
    $userTypes = UserType::all();
    $userType = UserType::find($user->userInfo->user_type);
    $view->with(['user' => $user, 'userType' => $userType, 'userTypes' => $userTypes]);
  }
}
