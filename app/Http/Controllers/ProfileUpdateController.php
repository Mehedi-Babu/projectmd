<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

class ProfileUpdateController extends Controller
{
    public function ProfileUpdate(Request $request)
    {

        // 'password' => ['required', 'string', 'min:8', 'confirmed'],


        $request->validate([
            'new_password' => 'required',
            'confirm_new_password' => 'required|same:new_password'
        ]);




        $update = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->otp, $update->password)) {

            $update->linkedin = $request->linkedin;
            $update->uni_id_number = $request->uni_id_number;
            $update->uni_department = $request->uni_department;
            $update->what_year_of_studires = $request->what_year_of_studires;
            $update->when_are_you_expecting_graduate = $request->when_are_you_expecting_graduate;
            $update->email_verified_at = now();
            $update->status = 1;
            $update->password = Hash::make($request->new_password);
            $update->save();


            Auth::logout();
            $noti = array(
                'message' => 'Successfully Password Change, Please Login With New Password Credential',
                'alert-type' => 'success'
            );
            return redirect('/login')->with($noti);
        } else {

            $noti = array(
                'message' => 'One Time Password Not Match Please Try Agaiin!!!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($noti);
        }
    }
}
