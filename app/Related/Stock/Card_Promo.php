<?php

namespace App\Related\Stock;

use Illuminate\Database\Eloquent\Model;

class Card_Promo extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'card_promo';
    protected $fillable = array(
        'card_id',
        'promo_id'
    );
    public $timestamps = false;
}
