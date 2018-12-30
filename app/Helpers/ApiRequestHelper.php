<?php
namespace App\Helpers;

use Session;

class ApiRequestHelper
{
    /**
     * Check user is authenticated or not.
     * @return boolean true/false
     */
    public static function apiRequest($url, $method = 'GET', $body = []){
        $url = 'http://127.0.0.1:8000/api/' . $url;
        // die($url);
        try{

	        $client = new \GuzzleHttp\Client();
			// $body['name'] = "Testing";
			// $url = "http://my-domain.com/api/v1/post";
			if($method = 'POST'){
				$response = $client->createRequest("POST", $url, ['body'=>$body]);
				$response = $client->send($response);
			} else {
				$request = $client->get($url);
				$response = $request->getBody();
			}
		} catch (\Exception $e){
			
		}

		return $response;
    }

    
    
}//END CLASS