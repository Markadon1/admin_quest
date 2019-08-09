<?php

namespace App\Http\Controllers;


use App\Stock\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Stock\Promo;
use App\Stock\Stock;
use App\Related\Stock\Card_Promo;
use App\Related\Stock\User_Stock;
use App\Related\Stock\Card_Cert;
class StockController extends Controller
{
        public function add_promo(Request $request){

            $name = $request->input('name');
            $number = $request->input('number');
            $stock = $request->input('stock_val');
            $stock_type = $request->input('stock_type');
            $date = $request->input('date');
            $quest_id = $request->input('quest_id');
            $single = $request->input('single');
            if($single == NULL){
                $single = 'Нет';
            }
            $under_stock = $request->input('stock_radio');
            if($under_stock == NULL){
                $under_stock = 'Нет';
            }
            $active = $request->input('active');
            if($active == NULL){
                $active = 'Нет';
            }

            $promo = new Promo();
            $promo->name = $name;
            $promo->number = $number;
            $promo->stock = $stock;
            $promo->stock_type = $stock_type;
            $promo->date = $date;
            $promo->quest_id = $quest_id;
            $promo->single = $single;
            $promo->under_stock = $under_stock;
            $promo->active = $active;
            $promo->quality = 0;
            $promo->save();

            $max = DB::table('promo')->max('id');

            $add_mig = new Card_Promo();
            $add_mig->card_id = $quest_id;
            $add_mig->promo_id = $max;
            $add_mig->save();


            return redirect('cards');

        }

    public function add_stock(Request $request){

            $user = Auth::id();

        $name = $request->input('name');
        $stock_val = $request->input('stock_val');
        $stock_type = $request->input('stock_type');
        $under_stock = $request->input('stock_radio');
        $description = $request->input('stock_descript');
        if($under_stock == NULL){
            $under_stock = 'Нет';
        }

        $stock = new Stock();
        $stock->name = $name;
        $stock->stock = $stock_val;
        $stock->description = $description;
        $stock->stock_type = $stock_type;
        $stock->under_stock = $under_stock;
        $stock->date = 'Не использовалась';
        $stock->quality = 0;
        $stock->save();

        $max = DB::table('stocks')->max('id');

        $add_mig = new User_Stock();
        $add_mig->user_id = $user;
        $add_mig->stock_id = $max;
        $add_mig->save();


        return redirect('cards');

    }

    public function add_certificate(Request $request){

        $number = $request->input('number');
        $stock = $request->input('stock_val');
        $stock_type = $request->input('stock_type');
        $date = $request->input('date_cert');
        $quest_id = $request->input('quest_id');
        $under_stock = $request->input('stock_radio');
        if($under_stock == NULL){
            $under_stock = 'Нет';
        }
        $active = $request->input('active');
        if($active == NULL){
            $active = 'Нет';
        }

        $certificate = new Certificate();
        $certificate->number = $number;
        $certificate->stock = $stock;
        $certificate->stock_type = $stock_type;
        $certificate->date = $date;
        $certificate->last_date = 'Не использовался';
        $certificate->quest_id = $quest_id;
        $certificate->under_stock = $under_stock;
        $certificate->active = $active;
        $certificate->quality = 0;
        $certificate->save();

        $max = DB::table('certificates')->max('id');

        $add_mig = new Card_Cert();
        $add_mig->card_id = $quest_id;
        $add_mig->cert_id = $max;
        $add_mig->save();


        return redirect('cards');


    }
}
