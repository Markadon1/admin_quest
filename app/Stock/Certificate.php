<?php

namespace App\Stock;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'certificates';
    protected $fillable = array(
        'number',
        'stock',
        'stock_type',
        'under_stock',
        'date',
        'quest_id',
        'active',
    );

    public $timestamps = false;
}
