<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oblast extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'oblast';
    protected $fillable = array(
        'oblast'
    );
    public $timestamps = false;
}
