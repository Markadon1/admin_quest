<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'city';
    protected $fillable = array(
        'oblast_id',
        'locations'
    );
    public $timestamps = false;
}
