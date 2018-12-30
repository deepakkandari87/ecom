<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use Auth;

class UserController extends Controller
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
        // print_r(Auth::user()->id);
        $users = Users::where('_id', Auth::user()->id)->first();
        // print_r($users);die;
        return view('user/index')->with(['users'=>$users]);
    }
    public function addUser(Request $request){

        $userData = Users::where('_id', Auth::user()->id)->first();

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'uploads' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $userData->company_name= $request->get('companyName');
            $userData->user_id= Auth::user()->id;
            $userData->account_type= 1;
            $userData->address= $request->get('address');
            $userData->city= $request->get('city');
            $userData->state= $request->get('state');
            $userData->country= $request->get('country');
            $userData->zip= $request->get('zip');
            $userData->is_active= true;
            
            
            $userData->save();
            return redirect('/user');
            
        }
        return view('user/add')->with(['userData'=>$userData]);
    }
    public function editUser(Request $request){
        return view('user/edit');
    }

    public function deleteUser(){
        
    }

    public function editUserProfile(Request $request){
        if ($request->isMethod('post')) {

            $field = $request->get('field');
            $data = $request->get('value');
            // print_r($request->all());die;
            
            $user = Users::where('_id',Auth::user()->id)->first();

            if($field == 'email'){
                $user->email = $data;
            } else if($field == 'phone') {
                $user->mobile = $data;
            } else if($field == 'name') {
                $user->name = $data;
            } else if($field == 'password') {
                $user->password = Hash::make($data);
            } else if($field == 'currency') {
                $user->currency = $data;
            } else if($field == 'timezone') {
                $user->timezone = $data;
            }
            $user->save();
            echo 1;
        } else {
            echo 0;
        }
    }
}
