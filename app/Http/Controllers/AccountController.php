<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Auth;
class AccountController extends Controller
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
        // print_r(Auth::user());

        $accounts = UserAccount::where('is_active', true)->where('user_id', Auth::user()->id)->get();
        
        return view('account/index')->with(['accounts'=>$accounts]);
    }

    public function addAccount(Request $request){

        $accountData = UserAccount::where('user_id', Auth::user()->id)->first();

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'uploads' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $accountData->company_name= $request->get('companyName');
            $accountData->user_id= Auth::user()->id;
            $accountData->account_type= 1;
            $accountData->address= $request->get('address');
            $accountData->city= $request->get('city');
            $accountData->state= $request->get('state');
            $accountData->country= $request->get('country');
            $accountData->zip= $request->get('zip');
            $accountData->is_active= true;
            
            $image = $request->file('uploads');
            $f = true;
            if(!empty($image)){
                if(in_array($image->getClientOriginalExtension(), ['jpeg','png','jpg','gif'])){

                    $accountData->logo = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path(config('constants.APP_BASE_PATH'));
                    $image->move($destinationPath, $accountData->logo);
                } else {
                    $f = false;
                }
            }
            if($f){
                $accountData->save();
                return redirect('/account');
            } else {

            }
        }
        return view('account/add')->with(['data'=>$accountData]);
    }
    public function editAccount(Request $request){
        return view('account/edit');
    }

    public function deleteAccount(){
        
    }
}
