<?php
namespace App\Acme\Singletons;

/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 9:48 PM
 */
class TokenGenerator
{

    public static function generateString(){
        return substr(str_shuffle(MD5(microtime())), 0, 15);
}
}