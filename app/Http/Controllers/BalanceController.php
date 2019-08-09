<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Balance;
use App\Cards;

use App\Related\User_Balance;
use App\Related\User_Card;
class BalanceController extends Controller
{
    public function create(Request $request){

        $sum = $request->input('sum');
        $quality = $request->input('quality');

        $add = new Balance();
        $add->sum = $sum;
        $add->quality = $quality;
        $add->user_id = Auth::id();
        $add->verify = 0;
        $add->card = 'NULL';
        $add->save();

        $max = DB::table('balance')->max('id');

        $add_mig = new User_Balance();
        $add_mig->user_id = Auth::id();
        $add_mig->balance_id = $max;
        $add_mig->save();

        $user = User::find(Auth::id());
        $user->key_sum = $user->key_sum + $quality;
        $user->save();

        $quest_count = User_Card::all()->where('user_id','=',Auth::id())->count();

        echo view('pages.settings.pay.add_balance')
            ->with('quest_count',$quest_count)
            ->with('user',$user);
    }
}
