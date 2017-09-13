<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
    	return view('users.password');
    }

    public function update()
    {
    	$this->validate(request(), [
    		'password' => 'required',
    		'new_password' => 'required',
    		'new_password_confirm' => 'required|same:new_password'
    	]);

    	if (Hash::check(request('password'), auth()->user()->password)) {

    		auth()->user()->update([
    			'password' => bcrypt(request('new_password'))
    		]);

    		Auth::logout();

    		return redirect()->route('login')->with('success', 'Password changed!  Please login again.');
    	}

    	return redirect()->back()->with('danger', 'Provided password is incorrect');
    }
}
