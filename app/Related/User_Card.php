<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class User_Card extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'user_card';
    protected $fillable = array(
        'user_id',
        'card_id'
    );
    public $timestamps = false;
}
