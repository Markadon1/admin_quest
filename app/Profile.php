<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'info';
    protected $fillable = array(
        'name',
        'min_hour',
        'max_hour',
        'telegram',
        'facebook',
        'yandex',
        'youtube',
        'google',
        'email_req',
        'key_sms',
        'name_sms',
        'calendar',
        'cancel_calendar'
    );
    public $timestamps = false;
}
