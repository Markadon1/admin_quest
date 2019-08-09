<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Cashbox extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_cashbox';
    protected $fillable = array(
        'user_id',
        'cashbox_id'
    );
    public $timestamps = false;
}
