<?php


namespace App\Helpers;

use App\Models\Setting;

class BobFinder
{
    static function bob()
    {
        $obj = Setting::all();
        return $obj;
    }
}



?>
