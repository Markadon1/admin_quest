<?php

namespace App\Related\Stock;

use Illuminate\Database\Eloquent\Model;

class Card_Cert extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'card_cert';
    protected $fillable = array(
        'card_id',
        'cert_id'
    );

    public $timestamps = false;
}
