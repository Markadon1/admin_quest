<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'balance';
    protected $fillable = array(
        'sum',
        'user_id',
        'sum',
        'quality',
        'card',
        'verify'
    );

    public $timestamps = true;
}
