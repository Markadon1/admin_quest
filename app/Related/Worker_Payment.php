<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class Worker_Payment extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'worker_payment';
    protected $fillable = array(
        'worker_id',
        'payment_id'
    );
    public $timestamps = false;
}
