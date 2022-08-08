<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpPassword;
use App\Mail\SendOtpPasswordThree;
use App\Mail\SendOtpPasswordTwo;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'team_name' => ['required', 'string', 'max:255'],
            'team_leader_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'linkedin' => ['required', 'string', 'max:255'],
            'what_uni_from' => ['required', 'string', 'max:255'],
            'uni_id_number' => ['required', 'string', 'max:255'],
            'uni_department' => ['required', 'string', 'max:255'],
            'what_year_of_studires' => ['required', 'string', 'max:255'],
            'when_are_you_expecting_graduate' => ['required', 'string', 'max:255'],
            'how_many_member_team' => ['required', 'string', 'max:255'],
            'second_team_member_name' => ['required', 'string', 'max:255'],
            'second_team_member_email' => ['required', 'string', 'max:255'],
            'second_team_member_phone' => ['required', 'string', 'max:255'],
//            'third_team_member_name' => ['required', 'string', 'max:255'],
//            'third_team_member_email' => ['required', 'string', 'max:255'],
//            'third_team_member_phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {




        $rand_pass1 = rand(0000000, 9999999);
        $rand_pass2 = rand(0000000, 9999999);
        $rand_pass3 = rand(0000000, 9999999);

        if ($data['email'] != null) {

            $store1 = new User();
            $store1->team_name = $data['team_name'];
            $store1->team_leader_name = $data['team_leader_name'];
            $store1->name = $data['team_leader_name'];
            $store1->email = $data['email'];
            $store1->phone = $data['phone'];
            $store1->linkedin = $data['linkedin'];
            $store1->what_uni_from = $data['what_uni_from'];
            $store1->uni_id_number = $data['uni_id_number'];
            $store1->uni_department = $data['uni_department'];
            $store1->what_year_of_studires = $data['what_year_of_studires'];
            $store1->when_are_you_expecting_graduate = $data['when_are_you_expecting_graduate'];
            $store1->how_many_member_team = $data['how_many_member_team'];
            $store1->password = Hash::make($rand_pass1);
            $store1->save();
            $store1->attachRole('user');
            $data_value = array(
                'name_one'      => $data['team_leader_name'],
                'em'      => $data['email'],
                'pass_one'   =>   $rand_pass1,
            );
            Mail::to($data_value['em'])->send(new SendOtpPassword($data_value));
        }


        if ($data['second_team_member_email'] != null) {

            $store2 = new User();
            $store2->team_name = $data['team_name'];
            $store2->team_leader_name = $data['team_leader_name'];
            $store2->name = $data['second_team_member_name'];
            $store2->email = $data['second_team_member_email'];
            $store2->phone = $data['second_team_member_phone'];
            $store2->password = Hash::make($rand_pass2);
            $store2->save();
            $store2->attachRole('user');
            $data_two = array(
                'name_two'      => $data['second_team_member_name'],
                'emt'      => $data['second_team_member_email'],
                'pass_two'   =>   $rand_pass2,
            );
            Mail::to($data_two['emt'])->send(new SendOtpPasswordTwo($data_two));
        }

        if ($data['third_team_member_email'] != null) {

            $store3 = new User();
            $store3->team_name = $data['team_name'];
            $store3->team_leader_name = $data['team_leader_name'];
            $store3->name = $data['third_team_member_name'];
            $store3->email = $data['third_team_member_email'];
            $store3->phone = $data['third_team_member_phone'];
            $store3->password = Hash::make($rand_pass3);
            $store3->save();
            $store3->attachRole('user');
            $data_three = array(
                'name_three'      => $data['third_team_member_name'],
                'emes'      => $data['third_team_member_email'],
                'pass_three'   =>   $rand_pass3,
            );
            Mail::to($data_three['emes'])->send(new SendOtpPasswordThree($data_three));
        }

        return $store1;

        // $noti = array(
        //     'message' => 'successfully Registration',
        //     'alert-type' => 'success'
        // );
        // return redirect()->back()->with($noti);
    }
}
