<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;

class TaxAccount extends Eloquent {

    protected $collection = 'users_accounts';

    // protected $fillable = [
    //     'user_id', 'account_type', 'company_name', 'logo', 'nickname', 'address', 'state', 'city', 'country', 'zip', 'pan', 'gst','is_active'
    // ];

    public static function updateWarehouse($warehouses, $companyId, $data=[]){
    	
    	if(!empty($data)) {
    		DB::collection('users_accounts')->where('_id', $companyId)->pull('warehouses', $data);
    	} 
    		
     	return DB::collection('users_accounts')->where('_id', $companyId)->push('warehouses', $warehouses);
    }
}