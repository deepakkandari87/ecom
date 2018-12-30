<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminChannel;
use Auth;
class AdminchannelController extends Controller
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
        $channels = AdminChannel::where('channelName', 'exists', true)->get();
        return view('adminchannel/index')->with(['channels'=>$channels]);
    }
    
    
    public function addChannel(Request $request){
        if ($request->isMethod('post')) {
        
            $this->validate($request, [
                'uploads' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $channel = new AdminChannel();
            
            //echo '<pre>'; print_r($request->input());
            
             $channel->channelName  = $request->get('channelName');
             $channel->shortname    = $request->get('shortname');
             $channelArray=[];
             if($request->input('apiName')){
                $i=0;
                foreach($request->input('apiName') as $key => $value){                    
                    $channelArray[$i]['name'] = $request->input('apiType')[$key];
                    $channelArray[$i]['api'] = $value;
                    $i++;
                }
             }
            $channel->api      = $channelArray;
            $image = $request->file('channelLogo');
            $f = true;
            if(!empty($image)){
                if(in_array($image->getClientOriginalExtension(), ['jpeg','png','jpg','gif'])){
                    $channel->logo = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path(config('constants.CHANNEL_LOGO'));
                    $image->move($destinationPath, $channel->logo);
                } else {
                    $f = false;
                }
            }
            if($f){
            $channel->save();
                return redirect('/admin-channel');
            }
            exit;
        }
        return view('adminchannel/add');
    }
    
    
    public function editChannel(Request $request,$id){
        $channel = AdminChannel::where('_id', $id)->first();
        //echo '<pre>';print_r($channel);exit;
        
        if ($request->isMethod('post')) {
            
            //echo '<pre>';print_r($request->input()); exit;
            $this->validate($request, [
                'uploads' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            //$channel = new AdminChannel();
            
             $channel->channelName  = $request->get('channelName');
             $channel->shortname    = $request->get('shortname');
             $channelArray=[];
             if($request->input('apiName')){
                $i=0;
                foreach($request->input('apiName') as $key => $value){                    
                    $channelArray[$i]['name'] = $request->input('apiType')[$key];
                    $channelArray[$i]['api'] = $value;
                    $i++;
                }
             }
            $channel->api      = $channelArray;
            
            
            $image = $request->file('channelLogo');
            $f = true;
            if(!empty($image)){
                if(in_array($image->getClientOriginalExtension(), ['jpeg','png','jpg','gif'])){

                    $channel->logo = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path(config('constants.CHANNEL_LOGO'));
                    $image->move($destinationPath, $channel->logo);
                } else {
                    $f = false;
                }
            }
            if($f){
            $channel->save();
                return redirect('/admin-channel');
            }
            exit;
        }
        
        return view('adminchannel/edit')->with(['channels'=>$channel]);
    }

    public function deleteAccount(){
        
    }
}
