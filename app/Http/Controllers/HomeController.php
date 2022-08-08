<?php

namespace App\Http\Controllers;

use App\Models\map_tq_login_credential;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user'] = User::where('id', Auth::user()->id)->first();
        if (Auth::user()->status == null) {
            return view('backend.profile.edit', $data);
        } else {

            return view('backend.main', $data);
        }
    }

    public function show()
    {
        try {
            $myTeam = Auth::user()->team_name;
            $members = User::where('team_name',$myTeam)->get();
            $accessToken = map_tq_login_credential::where('user_id',Auth::user()->id)->first();
            $expiryDate = null;
            if ($accessToken != null)
            {
                $expiryDate = date('Y-m-d', strtotime($accessToken->created_at."+90 days"));
            }
            return view('backend.group-member-list',compact('members','accessToken','expiryDate'));
        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage());
        }

    }
}
