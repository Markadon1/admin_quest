<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashBox extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'cashbox';
    protected $fillable = array(
        'name',
        'sum',
        'comment',
        'user_id'
    );
    public $timestamps = false;
}
