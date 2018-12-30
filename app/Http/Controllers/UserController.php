<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $users = User::get()->toArray();
        
        return view('user/index');
    }
    public function addUser(Request $request){

        if ($request->isMethod('post')) {

            $input['name']= $request->get('uname');
            $input['email']= $request->get('email');
            $input['role']= $request->get('role');
            $input['status']= 0;
            $lastId = User::createUser($input);

        } else {
            echo json_encode(['status'=>0,'response'=>'Something went wrong. Please try again.']);
        }
    }
    public function editUser(Request $request){
        return view('user/edit');
    }

    public function deleteUser(){
        
    }
}
