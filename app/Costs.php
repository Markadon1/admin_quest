<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costs extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'costs';
    protected $fillable = array(
        'user_id',
        'name',
        'type',
        'description'
    );
    public $timestamps = false;
}
