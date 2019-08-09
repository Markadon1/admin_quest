<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class Card_Photo extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'card_photo';
    protected $fillable = array(
        'card_id',
        'photo_id'
    );
    public $timestamps = false;
}
