<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Balance extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_balance';
    protected $fillable = array(
        'user_id',
        'balance_id'
    );

    public $timestamps = false;
}
