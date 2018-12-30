<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AdminChannel extends Eloquent {

    protected $collection = 'channel';

    //protected $fillable = [
    //    'channel_name', 'short_name', 'logo', 'nickname', 'address', 'state', 'city', 'country', 'zip', 'pan', 'gst','is_active'
    //];

}