<?php
namespace App\Acme\Transformers;
/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 2:17 PM
 */
abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}