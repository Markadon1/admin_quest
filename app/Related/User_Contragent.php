<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Contragent extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_contragent';
    protected $fillable = array(
        'user_id',
        'contragent_id'
    );
    public $timestamps = false;
}
