<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Profile extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_info';
    protected $fillable = array(
        'user_id',
        'info_id'
    );
    public $timestamps = false;
}
