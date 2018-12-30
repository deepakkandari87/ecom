<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminChannel;
use Auth;
class ChannelController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //print_r(Auth::user());exit;

        //$accounts = UserAccount::where('is_active', true)->where('user_id', Auth::user()->id)->get()->toArray();
        $channels = AdminChannel::where('channelName', 'exists', true)->get();
        return view('channel/index')->with(['channels'=>$channels]);
    }
    
    public function addAccount(Request $request){

        if ($request->isMethod('post')) {
            // $input['name']= $request->get('uname');
            // $input['email']= $request->get('email');
            // $input['role']= $request->get('role');
            // $input['status']= 0;
            // $lastId = User::createUser($input);
        }
        return view('account/add');
    }
    
    public function editAccount(Request $request){
        return view('account/edit');
    }

    public function deleteAccount(){
        
    }
}
