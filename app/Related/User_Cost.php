<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Cost extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_cost';
    protected $fillable = array(
        'user_id',
        'cost_id'
    );
    public $timestamps = false;
}
