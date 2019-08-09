<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'addresses';
    protected $fillable = array(
        'city',
        'address',
        'metro',
        'station',
        'flour'
    );
    public $timestamps = false;
}
