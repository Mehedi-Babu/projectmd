<?php

namespace App\Http\Controllers;

use App\Models\map_tq_login_credential;
use App\Models\map_tq_result;
use App\Models\user;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapTqController extends Controller
{
    private $soapclient     = null;
    private $secure_code    = '86817856d3425e458edb8c2040422b20';
    private $client_id      = '13475';
    private $project_id     = ''; //The project ID
    private $project_id_test= '355829'; //The test project ID
    private $project_id1    = '351960';    // Project ID 1
    private $project_id2    = '350195';    // Project ID 2
    private $norm_set_id_test= '1000';    // Norm set id test
    private $norm_set_id    = '';    // Norm set id test
    private $language_id    = '2';    // for English = 2
    private $return_url     = '';    // Return url
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->soapclient = new \SoapClient('https://ws01.maptq.com/ws/ws.asmx?WSDL');
        $this->return_url = url('/user');
        $this->project_id = $this->project_id_test;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            $soapclient = $this->soapclient;
            $param = [
                'requesttype'   =>  'page_candhub_autoregister',
                'securecode'    =>  $this->secure_code,
                'clientid'      =>  $this->client_id,
                'projectid'     =>  $this->project_id,
                'candidateid'   =>  $user->id,
                'languageid'    =>  $this->language_id,
                'firstname'     =>  $user->name,
                'returnurl'     =>  $this->return_url,
                'email'         =>  $user->email
            ];
            $response = $soapclient->runWSxml($param);
            $xml = $response->runWSxmlResult->any;

            $replaced = ltrim($xml,'<response xmlns=""><result><![CDATA[');
            $replaced = rtrim($replaced,'</candidateid></response>');
            $dataWithComma = str_replace(']]></result><candidateid>', ',', $replaced);
            $finalData = explode(',', $dataWithComma);
            $accessToken = map_tq_login_credential::where('user_id',$user->id)->first();
            if ($accessToken == null)
            {
                map_tq_login_credential::create([
                    'user_id'   => $finalData[1],// candidate id
                    'token'     => $finalData[0],// token url for MapTQ login
                    'raw_data'  => $xml // response data
                ]);
            }
            else {
                map_tq_login_credential::where('user_id',$user->id)->update([
                    'token'     => $finalData[0],// token url for MapTQ login
                    'raw_data'  => $xml, // response data
                    'created_at'=> now()
                ]);
            }
            return back()->with('success','Register successfully. For start your exam click the Start Now button.');
        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    public function result($id)
    {
        try {
            $user = Auth::user();
            $soapclient = $this->soapclient;
            $result[] = null;
            if ($user->id == $id)
            {
                $param = [
                    'requesttype'   =>  'scores_full',
                    'securecode'    =>  $this->secure_code,
                    'clientid'      =>  $this->client_id,
                    'projectid'     =>  $this->project_id,
                    'candidateid'   =>  $user->id,
                    'normsetid'     =>  $this->norm_set_id_test,
                    'languageid'    =>  $this->language_id,
                ];

                $response = $soapclient->runWSxml($param);
                $raw_response_str = $response->runWSxmlResult->any;
                $response = simplexml_load_string($response->runWSxmlResult->any);
                $result = json_decode(json_encode($response),true);
                dd($result);
//                if ($result != null)
//                {
//                    $myResultDB = map_tq_result::where('candidateid',$user->id)->first();
//                    if ($myResultDB != null)
//                    {
//                        if ($myResultDB->result != $result['result'])
//                        {
//                            //update
//                            map_tq_result::where('candidateid',$result['candidateid'])->update([
//                                'result'        =>  $result['result'],
//                                'raw_data'      =>  $raw_response_str,
//                            ]);
//                        }
//
//                    }
//                    else{
//                        //insert
//                        map_tq_result::create([
//                            'candidateid'   =>  $result['candidateid'],
//                            'result'        =>  $result['result'],
//                            'raw_data'      =>  $raw_response_str,
//                        ]);
//                    }
//                }
//                $finalResultDB = map_tq_result::where('candidateid',$user->id)->first();
//                dd( $finalResultDB);
            }
        }catch (\Throwable $exception)
        {
            return back()->with('error',$exception->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
