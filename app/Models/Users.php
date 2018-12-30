<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Users extends Eloquent {

    protected $collection = 'users';

}