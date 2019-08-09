<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'cards';
    protected $fillable = array(
        'name',
        'type',
        'min_gamer',
        'max_gamer',
        'complex',
        'time',
        'fear',
        'phone',
        'actors',
        'und_pay',
        'age',
        'reserv_minute',
        'reserv_day',
        'address',
        'new',
        'online',
        'short_descript',
        'long_descript',
        'legend'
    );
    public $timestamps = false;

    public function addresses()
    {
        return $this->belongsToMany('App\Address', 'card_address', 'card_id', 'address_id');
    }
    public function photos()
    {
        return $this->belongsToMany('App\Photos', 'card_photo', 'card_id', 'photo_id');
    }
    public function promo()
    {
        return $this->belongsToMany('App\Stock\Promo', 'card_promo', 'card_id', 'promo_id');
    }
    public function certificates()
    {
        return $this->belongsToMany('App\Stock\Certificate', 'card_cert', 'card_id', 'cert_id');
    }
}
