<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserAccount extends Eloquent {

    protected $collection = 'users_accounts';

    protected $fillable = [
        'user_id', 'account_type', 'company_name', 'logo', 'nickname', 'address', 'state', 'city', 'country', 'zip', 'pan', 'gst','is_active'
    ];

}