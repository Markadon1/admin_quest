<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'payments';
    protected $fillable = array(
        'user_id',
        'name',
        'sum',
        'type',
        'month',
        'day',
        'stock'
    );
    public $timestamps = false;
}
