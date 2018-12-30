<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Helpers\ApiRequestHelper;
use Illuminate\Support\Facades\Input;

use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        
    }

    public function login(Request $request)
    {
        print_r($request->all());
        $body['email'] = $request->get('email');
        $body['password'] = $request->get('password');
        print_r($body);
        // $response = ApiRequestHelper::apiRequest('api-login', 'POST', $body);
        // print_r($response);
        
        $body['active'] = 1;

        if (Auth::check()) {

        } else {

            if (Auth::attempt($body))
            {
                
                echo 'login';
                //return redirect()->intended('dashboard');
            } else {
                echo 'no ligin ';
            }
        }

    }

    public function logout()
    {
        
        return Redirect::to('login'); // redirect the user to the login screen
    }
}