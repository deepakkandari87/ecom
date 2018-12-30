<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;

class UserCompanies extends Eloquent {

    protected $collection = 'users_companies';

    public static function updateWarehouse($warehouses, $companyId, $data=[]){
        
        if(!empty($data)) {
            DB::collection('users_companies')->where('_id', $companyId)->pull('warehouses', $data);
        } 
            
        return DB::collection('users_companies')->where('_id', $companyId)->push('warehouses', $warehouses);
    }

    public static function getWareHouses($companyId){
        $companyData = UserCompanies::where('_id',$companyId)->where('user_id',Auth::user()->id)->first(['warehouses']);

    }
}