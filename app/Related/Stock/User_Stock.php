<?php

namespace App\Related\Stock;

use Illuminate\Database\Eloquent\Model;

class User_Stock extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_stock';
    protected $fillable = array(
        'user_id',
        'stock_id'
    );
    public $timestamps = false;
}
