<?php
/**
 * Created by PhpStorm.
 * User: jed
 * Date: 25/04/2019
 * Time: 12:08 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class CustomModel extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'question', 'answer', 'phone_no', 'address', 'sender_id', 'recipient_id',
        'user_id', 'weight', 'distance', 'cost', 'status', 'token', 'dispatcher_id'
    ];

}