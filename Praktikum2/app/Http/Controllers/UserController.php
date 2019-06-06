<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function userIndex()
    {
        $user = User::find(Auth::id());
        return view('auth.user')->with('user', $user);
    }

    public function userEditName(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name = $request->input('username');
        $user->save();
        return redirect()->route( 'userIndex' )->with( [ 'user' => $user ] );
    }

    public function userEditEmail(Request $request)
    {
        $user = User::find(Auth::id());
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route( 'userIndex' )->with( [ 'user' => $user ] );
    }

    public function userEditPassword(Request $request)
    {
        $user = User::find(Auth::id());
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route( 'userIndex' )->with( [ 'user' => $user ] );
    }
}
