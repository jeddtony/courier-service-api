<?php
/**
 * Created by PhpStorm.
 * User: jed
 * Date: 26/04/2019
 * Time: 3:30 AM
 */

namespace App\Acme\Singletons;


class CalculateCost
{

    public static function totalCost($distance, $weight){
        //In calculating the cost we charge N100 for each kilometre, and N200 for each kilogram of the parcel
        $totalCost = ((double)$distance * 100) + ((double) $weight * 200);
        return $totalCost;
}
}