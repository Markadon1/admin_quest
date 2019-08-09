<?php

namespace App\Related;

use Illuminate\Database\Eloquent\Model;

class Worker_Quest extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'worker_quest';
    protected $fillable = array(
        'worker_id',
        'worker_quest'
    );
    public $timestamps = false;
}
