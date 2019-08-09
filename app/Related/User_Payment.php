<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Payment extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_payment';
    protected $fillable = array(
        'user_id',
        'payment_id'
    );
    public $timestamps = false;
}
