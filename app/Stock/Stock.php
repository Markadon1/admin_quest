<?php

namespace App\Stock;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'stocks';
    protected $fillable = array(
        'name',
        'stock',
        'stock_type',
        'date',
        'under_stock',
        'quality',
    );
    public $timestamps = false;
}
