<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Worker extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_worker';
    protected $fillable = array(
        'user_id',
        'worker_id'
    );
    public $timestamps = false;
}
