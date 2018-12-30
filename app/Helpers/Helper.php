<?php
namespace App\Helpers;

use Session;

class Helper
{
    /**
     * Check user is authenticated or not.
     * @return boolean true/false
     */
    public static function checkAuth(){
        
        return (Session::get("userSession") != '' && Session::get("userSession") != null) ? true : false;
    }

    public static function userData(){
        $userData = Session::get("userSession");
        
        return json_decode($userData);
    }

    public static function csvToArray($filename = '', $delimiter = ',')
    {
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    public static function arrayToObject($array) {
        return (object) $array;
    }

    public static function objectToArray($object) {
        return (array) $object;
    }
    
}//END CLASS