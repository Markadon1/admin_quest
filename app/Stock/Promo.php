<?php

namespace App\Stock;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'promo';
    protected $fillable = array(
        'name',
        'number',
        'stock',
        'stock_type',
        'date',
        'quest_id',
        'single',
        'under_stock',
        'quality',
        'active'
    );
    public $timestamps = false;
}
