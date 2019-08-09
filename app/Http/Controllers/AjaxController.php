<?php

namespace App\Http\Controllers;



use Faker\Provider\Payment;
use Illuminate\Http\Request;

use App\User;
use App\Photos;
use App\Cards;
use App\CashBox;
use App\Contragents;
use App\Costs;
use App\Payments;

use App\Related\Card_Photo;
use App\Related\Card_Address;
use App\Related\User_Cashbox;
use App\Related\User_Contragent;
use App\Related\User_Cost;
use App\Related\User_Card;
use App\Related\User_Payment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class AjaxController extends Controller
{

    public function cards_menu(Request $request){

        $val = $request->input('val');
        $user = User::find(Auth::id());
        $cards_count = User::has('cards')->count();
        if ($val == 'cvest'){
        echo view('pages.settings.cvests')
                    ->with('user',$user)
                    ->with('cards_count',$cards_count);
        }
        if ($val == 'bonus'){
            echo view('pages.settings.stock');
        }
        if ($val == 'contragent'){
            echo view('pages.settings.contragent');
        }
        if ($val == 'costs'){
            echo view('pages.settings.costs');
        }
        if($val == 'cash'){
            $cashbox_count = CashBox::all()->where('user_id','=',Auth::id())->count();
            echo view('pages.settings.cashbox')
                    ->with('cashbox_count',$cashbox_count)
                    ->with('user',$user);
        }
        if ($val == 'pay'){
            echo view('pages.settings.pay');
        }
        if ($val == 'payment'){
            echo view('pages.settings.payment');
        }
    }

    public function add_cashbox(Request $request){

        $user_id = Auth::id();
        $id = $request->input('id');
        $name = $request->input('name');
        $comment = $request->input('comment');
        if($comment == NULL){
            $comment = 'Комментарий отсутствует';
        }

        if($id == 0){
        $add_cashbox = new CashBox();
        $add_cashbox->user_id = $user_id;
        $add_cashbox->name = $name;
        $add_cashbox->comment = $comment;
        $add_cashbox->sum = 0;
        $add_cashbox->save();

        $max = DB::table('cashbox')->max('id');

        $add_mig = new User_Cashbox();
        $add_mig->user_id = $user_id;
        $add_mig->cashbox_id = $max;
        $add_mig->save();
        }
        else{
            $add_cashbox = CashBox::find($id);
            $add_cashbox->name = $name;
            $add_cashbox->comment = $comment;
            $add_cashbox->save();
        }
        $user = User::find($user_id);
        $cashbox_count = CashBox::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.cashbox_body')
                    ->with('user',$user)
                    ->with('cashbox_count',$cashbox_count);

    }

    public function delete_cashbox(Request $request){

        $id = $request->input('id');

        CashBox::where('id','=',$id)->delete();
        User_Cashbox::where('cashbox_id','=',$id)->delete();

        $user = User::find(Auth::id());
        $cashbox_count = CashBox::all()->where('user_id','=',Auth::id())->count();

        echo view('ajax.cashbox_body')
            ->with('user',$user)
            ->with('cashbox_count',$cashbox_count);
    }

    public function add_cost(Request $request){

        $id = $request->input('id');
        $name = $request->input('name');
        $type = $request->input('type');
        $description = $request->input('description');

        if($id == 0){

            $cost = new Costs();
            $cost->name = $name;
            $cost->type = $type;
            $cost->description = $description;
            $cost->user_id = Auth::id();
            $cost->save();

            $max = DB::table('costs')->max('id');

            $add_mig = new User_Cost();
            $add_mig->user_id = Auth::id();
            $add_mig->cost_id = $max;
            $add_mig->save();
        }
        else{
            $cost = Costs::find($id);
            $cost->name = $name;
            $cost->type = $type;
            $cost->desctiption = $description;
            $cost->save();
        }

        $user = User::find(Auth::id());
        $cost_count = Costs::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.costs_content')
            ->with('user',$user)
            ->with('cost_count',$cost_count);

    }

    public function costs(){
        $user = User::find(Auth::id());
        $cost_count = Costs::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.costs_content')
            ->with('user',$user)
            ->with('cost_count',$cost_count);
    }

    public function contragent(){

        echo view('ajax.contragent_form');

    }

    public function contragent_content(){

        $user = User::find(Auth::id());
        $contr_count = Contragents::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.contragent_content')
                        ->with('contr_count',$contr_count)
                        ->with('user',$user);

    }

    public function contragent_create(Request $request){

        $user_id = Auth::id();

        $user = User::find($user_id);

        $id = $request->input('id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');
        $face = $request->input('face');
        $inn = $request->input('inn');

        if($id == 0){
        $contragent = new Contragents();
        $contragent->user_id = $user_id;
        $contragent->name = $name;
        $contragent->phone = $phone;
        $contragent->email = $email;
        $contragent->address = $address;
        $contragent->face = $face;
        $contragent->inn = $inn;
        $contragent->save();

        $max = DB::table('contragents')->max('id');

        $mig = new User_Contragent();
        $mig->user_id = $user_id;
        $mig->contragent_id = $max;
        $mig->save();
        }
        else{
            $contragent = Contragents::find($id);
            $contragent->user_id = $user_id;
            $contragent->name = $name;
            $contragent->phone = $phone;
            $contragent->email = $email;
            $contragent->address = $address;
            $contragent->face = $face;
            $contragent->inn = $inn;
            $contragent->save();
        }
        $contr_count = Contragents::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.contragent_content')
                    ->with('contr_count',$contr_count)
                    ->with('user',$user);

    }

    public function contragent_delete(Request $request){

        $id = $request->input('id');

        Contragents::where('id','=',$id)->delete();
        User_Contragent::where('contragent_id','=',$id)->delete();

        $user = User::find(Auth::id());
        $contr_count = Contragents::all()->where('user_id','=',Auth::id())->count();

        echo view('ajax.contragent_content')
            ->with('contr_count',$contr_count)
            ->with('user',$user);
    }

    public function pay_content(Request $request){

        $item = $request->input('balance_item');
        $user = User::find(Auth::id());
        $quest_count = User_Card::all()->where('user_id','=',Auth::id())->count();
        if ($item == 'balance'){
            echo view('pages.settings.pay.add_balance')
                ->with('quest_count',$quest_count)
                ->with('user',$user);
        }
        if ($item == 'history'){
            echo view('pages.settings.pay.history')
                ->with('user',$user);
        }
    }

    public function payment(){

        $user = User::find(Auth::id());
        $payment_count = Payments::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.payment_content')
            ->with('payment_count',$payment_count)
            ->with('user',$user);

    }

    public function add_payment(Request $request){

        $name = $request->input('name');
        $sum = $request->input('sum');
        $one = $request->input('one');
        $month = $request->input('month');
        $id = $request->input('id');
        $type = $request->input('type');
        $stock = $request->input('stock');

        if($id == 0){

            $add = new Payments();
            $add->user_id = Auth::id();
            $add->name = $name;
            $add->sum = $sum;
            $add->day = $one;
            $add->month = $month;
            $add->type = $type;
            $add->stock = $stock;
            $add->save();

            $max = DB::table('payments')->max('id');

            $add_mig = new User_Payment();
            $add_mig->user_id = Auth::id();
            $add_mig->payment_id = $max;
            $add_mig->save();

        }
        else{
            $find = Payments::find($id);
            $find->name = $name;
            $find->sum = $sum;
            $find->day = $one;
            $find->month = $month;
            $find->type = $type;
            $find->stock = $stock;
            $find->save();
        }

        $user = User::find(Auth::id());
        $payment_count = Payments::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.payment_content')
            ->with('payment_count',$payment_count)
            ->with('user',$user);
    }

    public function delete_payment(Request $request){

        $id = $request->input('id');

        Payments::where('id','=',$id)->delete();
        User_Payment::where('payment','=',$id)->delete();

        $user = User::find(Auth::id());
        $payment_count = Payments::all()->where('user_id','=',Auth::id())->count();
        echo view('ajax.payment_content')
            ->with('payment_count',$payment_count)
            ->with('user',$user);

    }

    public function stock_menu(Request $request){
        $item = $request->input('menu_item');
        $user = User::find(Auth::id());
        if ($item == 'certificate'){
            echo view('pages.settings.stock.certificate')
                ->with('user',$user);
        }
        if ($item == 'promo'){
            echo view('pages.settings.stock.promo')
                ->with('user',$user);
        }
        if ($item == 'stock'){
            echo view('pages.settings.stock.stock')
                ->with('user',$user);
        }
    }

    public function stock_create(Request $request){

        $name = $request->input('form_name');
        $user_id = Auth::id();
        $user = User::find($user_id);
        if($name == 'certificate'){
            echo view('pages.settings.stock.forms.certificate_form')
                ->with('user',$user);
        }
        if($name == 'promo'){
            echo view('pages.settings.stock.forms.promo_form')
                ->with('user',$user);
        }
        if($name == 'stock'){
            echo view('pages.settings.stock.forms.stock_form')
                ->with('user',$user);
        }


    }

    public function load_cont(Request $request){
        $card_id = $request->input('card_id');
        $card = Cards::find($card_id);
        $photo_count = Card_Photo::all()->where('card_id','=',$card_id)->count();
        echo view('ajax.photo_restore')
            ->with('card',$card)
            ->with('photo_count',$photo_count);
    }

    public function add_photo(Request $request){

        $photo = $request->file('photo');
        $card_id = $request->input('card_id');
        $filename = str_random(5).$photo->getClientOriginalName();
        $photo->move('images/photo',$filename);

        $add = new Photos();
        $add->name = $filename;
        $add->main = 0;
        $add->save();

        $max = DB::table('photos')->max('id');

        $mig = new Card_Photo();
        $mig->card_id = $card_id;
        $mig->photo_id = $max;
        $mig->save();

        $request->session()->flash('success','Фото успешно добавлено!');

        $quest = Cards::find($card_id);
        $photo_count = Card_Photo::all()->where('card_id','=',$card_id)->count();
        $user = User::find(Auth::id());

        return view('pages.settings.cvest.multimedia')
            ->with('photo_count',$photo_count)
            ->with('quest',$quest)
            ->with('user',$user);

    }

    public function add_photo_restore(Request $request){
        $photo = $request->file('photo');
        $card_id = $request->input('card_id');
        $filename = str_random(5).$photo->getClientOriginalName();
        $photo->move('images/photo',$filename);

        $add = new Photos();
        $add->name = $filename;
        $add->main = 0;
        $add->save();

        $max = DB::table('photos')->max('id');

        $mig = new Card_Photo();
        $mig->card_id = $card_id;
        $mig->photo_id = $max;
        $mig->save();

        $request->session()->flash('success','Фото успешно добавлено!');

        $card = Cards::find($card_id);
        $photo_count = Card_Photo::all()->where('card_id','=',$card_id)->count();
        echo view('ajax.photo_restore')
            ->with('card',$card)
            ->with('photo_count',$photo_count);
    }
    public function photo_main(Request $request){

        $id = $request->input('id');
        $card_id = $request->input('card_id');
        $restore = $request->input('restore');
        $array = Card_Photo::all()->where('card_id','=',$card_id);
        foreach ($array as $arr){
            $mig_id = $arr->photo_id;

            $main_null = Photos::find($mig_id);
            $main_null->main = 0;
            $main_null->save();
        }

        $add_main = Photos::find($id);
        $add_main->main = 1;
        $add_main->save();

        $quest = Cards::find($card_id);
        $card = Cards::find($card_id);
        $photo_count = Card_Photo::all()->where('card_id','=',$card_id)->count();
        if($restore == NULL){
        echo view('ajax.photo')
            ->with('quest',$quest);
        }
        if($restore == 'yes'){
            echo view('ajax.photo_restore')
                ->with('card',$card)
                ->with('photo_count',$photo_count);
        }
    }


    public function photo_delete(Request $request)
    {

        $id = $request->input('id');

        Photos::where('id','=',$id)->delete();
        Card_Photo::where('photo_id','=',$id)->delete();

    }

    public function ph(Request $request){
        $file = $request->file('file');
        $card_id = $request->input('card_id');
        $filename = $file->getClientOriginalName();
        echo $filename.'/'.$card_id;
    }

}
