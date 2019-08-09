<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contragents extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'contragents';
    protected $fillable = array(
        'user_id',
        'name',
        'phone',
        'email',
        'inn',
        'address',
        'face'
    );
    public $timestamps = false;
}
