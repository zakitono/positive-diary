<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function guest()
    {
        $guestUserId = 1; //ゲストユーザーのIDを１とする
        $user = User::find($guestUserId);
        if (isset($user)) {
            Auth::login($user);

            return redirect()->route('diary');
        }
        return redirect()->route('/');
    }
}
