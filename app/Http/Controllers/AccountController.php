<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use App\Models\UserCompanies;
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

        $accounts = UserAccount::where('is_active', true)->where('account_type',1)->where('user_id', Auth::user()->id)->orderBy('account_type','ASC')->get();
        // echo Auth::user()->id;
        // print_r($accounts);die;
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

    public function companies()
    {
        // print_r(Auth::user());

        $companies = UserCompanies::where('is_active', true)->where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->get();
        // echo '<pre>';print_r($companies);die;
        return view('company/index')->with(['companies'=>$companies]);
    }

    public function addCompany(Request $request){

        $companyData = new UserCompanies();

        if ($request->isMethod('post')) {

            $res = $this->updateCompany($request, $companyData);
            if($res == 1){
                return redirect('account/companies');

            }
        }
        return view('company/add')->with(['data'=>$companyData]);
    }

    public function editCompany(Request $request, $id=''){

        $companyData = UserCompanies::where('_id',$id)->where('user_id',Auth::user()->id)->first();
    // echo '<pre>';print_r($companyData);die;
        if ($request->isMethod('post')) {

            $res = $this->updateCompany($request, $companyData);
            if($res == 1){
                return redirect('account/companies');

            }
        }
        return view('company/edit')->with(['data'=>$companyData]);
    }

    public function updateCompany($request, $companyData){
        
        $this->validate($request, [
            'uploads' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if(empty($companyData->account_type)){
            $companyData->account_type= 2;
        }
        $companyData->company_name= $request->get('companyName');
        $companyData->email= $request->get('email');
        $companyData->phone= $request->get('phone');
        $companyData->user_id= Auth::user()->id;
        $companyData->address= $request->get('address');
        $companyData->city= $request->get('city');
        $companyData->state= $request->get('state');
        $companyData->country= $request->get('country');
        $companyData->zip= $request->get('zip');
        $companyData->pan= $request->get('pan');
        $companyData->tax= $request->get('tax');
        $companyData->cst= $request->get('cst');
        $companyData->is_active= true;
        
        $image = $request->file('uploads');
        // print_r($image);
        $f = true;
        if(!empty($image)){
            if(in_array($image->getClientOriginalExtension(), ['jpeg','png','jpg','gif'])){

                $companyData->logo = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path(config('constants.APP_BASE_PATH'));
                $image->move($destinationPath, $companyData->logo);
            } else {
                $f = false;
            }
        }
        // print_r($companyData);die;
        if($f){
            $companyData->save();
            return 1;
        } else {
           return 0; 
        }
    }

    public function addWarehouse(Request $request, $companyId){

        $companyData = UserCompanies::where('user_id',Auth::user()->id)->get(['warehouses']);

        $warehouses = $this->getWarehouses($companyData);

        if ($request->isMethod('post')) {

            $res = $this->updateWarehouse($request, $companyId);
            if($res == 1){
                return redirect('account/companies');

            }
        }
        return view('warehouse/add')->with(['data'=>[], 'companyId'=>$companyId, 'warehouses'=>$warehouses]);
    }

    public function editWarehouse(Request $request, $companyId, $id){

        $companyData = UserCompanies::where('_id',$companyId)->where('user_id',Auth::user()->id)->first();

        $data = [];
        if(!empty($companyData->warehouses[$id])){

            $data = $companyData->warehouses[$id];
        }

        if ($request->isMethod('post')) {

            $res = $this->updateWarehouse($request, $companyId, $data);
            if($res == 1){
                return redirect('account/companies');
            }
        }
        
        return view('warehouse/edit')->with([ 'data'=>$data, 'companyId'=>$companyId, 'id' => $id]);
    }

    private function getWarehouses($warehouses = []){
        $wh=[];
        foreach ($warehouses as $warehouse) {
            if(!empty($warehouse['warehouses']))                
                foreach ($warehouse['warehouses'] as $value) {
                    $wh[] = !empty($value['warehouse']) ? $value['warehouse'] : [];
                }
        }
        $wh = !empty($wh) ? array_unique($wh) : [];
        return $wh;
    }

    private function updateWarehouse($request, $companyId, $data=[]){

        $warehouses = [
                       
                "warehouse" => $request->get('warehouse'),
                "shortcode" => $request->get('shortcode'),
                "nickname" => $request->get('nickname'),
                "partner" => $request->get('partner'),
                "email" => $request->get('email'),
                "phone" => $request->get('phone'),
                "address" => $request->get('address'),
                "city" => $request->get('city'),
                "state" => $request->get('state'),
                "country" => $request->get('country'),
                "zip" => $request->get('zip'),
                "tax" => $request->get('tax'),
                "vat" => $request->get('vat'),
                "cst" => $request->get('cst'),
                "active" => true
        ];
        
        $res = UserCompanies::updateWarehouse($warehouses, $companyId, $data);
        if($res){
            return 1;
        } else {
            return 0;
        }
    }

    public function warehousesList($companyId, $id){
        $companyData = UserCompanies::where('_id',$companyId)->where('user_id',Auth::user()->id)->first();
        $data = [];
        if(!empty($companyData) && !empty($companyData->warehouses[$id])){
            $data = $companyData->warehouses[$id];
        }
        echo json_encode($data);
    }
}
