<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class Card_Address extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'card_address';
    protected $fillable = array(
        'card_id',
        'address_id'
    );
    public $timestamps = false;
}
