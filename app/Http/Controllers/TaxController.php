<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxAccount;
use Auth;

class TaxController extends Controller
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

        $tax = TaxAccount::where('is_active', true)->where('user_id', Auth::user()->id)->orderBy('id','ASC')->get();
        // echo Auth::user()->id;
        // print_r($accounts);die;
        return view('tax/index')->with(['tax'=>$tax]);
    }

    public function addTax(Request $request){

        print_r($request->all());die;
        $companyData = new UserCompanies();

        if ($request->isMethod('post')) {

            $res = $this->updateCompany($request, $companyData);
            if($res == 1){
                return redirect('account/tax');

            }
        }
        return view('tax/add')->with(['data'=>$companyData]);
    }

    public function editTax(Request $request, $id=''){

        $companyData = UserCompanies::where('_id',$id)->where('user_id',Auth::user()->id)->first();
    // echo '<pre>';print_r($companyData);die;
        if ($request->isMethod('post')) {

            $res = $this->updateCompany($request, $companyData);
            if($res == 1){
                return redirect('account/tax');

            }
        }
        return view('tax/edit')->with(['data'=>$companyData]);
    }

    
}
