<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\CanResetPassword;
class User extends Authenticatable
{
    use Notifiable;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    }
    protected function signIn(Request $request)
    {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
    }

    protected $fillable = [
        'name', 'email', 'password','phone','key_sum','info','verified','token'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function confirmEmail()
    {
        $this->verified = true;
        $this->save();
    }
    public function cleanToken(){
        $this->token = null;
        $this->save();
    }

    protected function getCredentials(Request $request)
    {
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
            'verified' => 1
        ];
    }

    public function cards()
    {
        return $this->belongsToMany('App\Cards', 'user_card', 'user_id', 'card_id');
    }
    public function addresses()
    {
        return $this->belongsToMany('App\Address', 'user_address', 'user_id', 'address_id');
    }
    public function stocks()
    {
        return $this->belongsToMany('App\Stock\Stock', 'user_stock', 'user_id', 'stock_id');
    }
    public function cashboxes()
    {
        return $this->belongsToMany('App\Cashbox', 'user_cashbox', 'user_id', 'cashbox_id');
    }
    public function contragents()
    {
        return $this->belongsToMany('App\Contragents', 'user_contragent', 'user_id', 'contragent_id');
    }
    public function costs()
    {
        return $this->belongsToMany('App\Costs', 'user_cost', 'user_id', 'cost_id');
    }
    public function balance()
    {
        return $this->belongsToMany('App\Balance', 'user_balance', 'user_id', 'balance_id');
    }
    public function payments()
    {
        return $this->belongsToMany('App\Payments', 'user_payment', 'user_id', 'payment_id');
    }
    public function infos()
    {
        return $this->belongsToMany('App\Profile', 'user_info', 'user_id', 'info_id');
    }
    public function workers()
    {
        return $this->belongsToMany('App\Workers', 'user_worker', 'user_id', 'worker_id');
    }

}
