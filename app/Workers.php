<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'workers';
    protected $fillable = array(
        'name',
        'email',
        'phone',
        'position',
        'access',
        'telegram',
        'sms',
        'quests',
        'logo',
        'random_id'
    );
    public $timestamps = false;

    public function payments()
    {
        return $this->belongsToMany('App\Payments', 'worker_payment', 'worker_id', 'payment_id');
    }
    public function cards()
    {
        return $this->belongsToMany('App\Cards', 'worker_quest', 'worker_id', 'quest_id');
    }
}
