<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_address';
    protected $fillable = array(
        'user_id',
        'address_id'
    );
    public $timestamps = false;
}
