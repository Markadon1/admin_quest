<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'photos';
    protected $fillable = array(
        'name',
        'main'
    );
    public $timestamps = false;
}
