<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartNWish extends Model
{
    protected $table = 'cartnwish';

    public static function getRecord($identifier, $instance)
    {
        $cart = static::where('identifier', $identifier)->where('instance', $instance);
        $cart->value('content');
    }

    public static function deleteRecord($identifier, $instance)
    {
        $cart = static::where('identifier', $identifier)->where('instance', $instance);
        $cart->delete();
    }
}
