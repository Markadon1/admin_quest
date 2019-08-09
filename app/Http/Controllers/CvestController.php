<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\City;
use App\Oblast;
use App\Cards;
use App\Address;
use App\Photos;
use App\Videos;

use App\Related\User_Address;
use App\Related\Card_Address;
use App\Related\User_Card;
use App\Related\Card_Video;
use App\Related\Card_Photo;


class CvestController extends Controller
{
    public function redirect_to_create(Request $request){

        $cities = City::all();
        $oblasts = Oblast::all();
        $user_id = Auth::id();
        $user = User::find($user_id);
        return view('pages.settings.cvest.create')
            ->with('cities',$cities)
            ->with('oblasts',$oblasts)
            ->with('user',$user);
    }

    public function create_address(Request $request){

        $user_id = Auth::id();
        $user = User::find($user_id);

        $city = $request->input('city');
        $address = $request->input('address');
        $metro = $request->input('metro');
        if($metro == NULL){
            $metro = 'NULL';
        }
        $station = $request->input('station');
        $flour = $request->input('flour');
        if($flour == NULL){
            $flour = 'NULL';
        }

        $add_address = new Address();
        $add_address->city = $city;
        $add_address->address = $address;
        $add_address->metro = $metro;
        $add_address->station = $station;
        $add_address->flour = $flour;
        $add_address->save();

        $address_id = DB::table('addresses')->max('id');

        $add_mig = new User_Address();
        $add_mig->user_id = $user_id;
        $add_mig->address_id = $address_id;
        $add_mig->save();

        echo view('ajax.new_address')
                ->with('user',$user);
    }

    public function create_cvest(Request $request){

        $user_id = Auth::id();

        $name = $request->input('name');
        $min_gamer = $request->input('min_gamer');
        if($min_gamer == NULL){
            $min_gamer = 1;
        }
        $max_gamer = $request->input('max_gamer');
        if($max_gamer == NULL){
            $max_gamer = 2;
        }
        $complex = $request->input('complex');
        $fear = $request->input('fear');
        $phone = $request->input('phone');
        $actors = $request->input('actors');
        $time = $request->input('time');
        if($actors == NULL){
            $actors = 'Нет';
        }
        $und_pay = $request->input('und_pay');
        if($und_pay == NULL){
            $und_pay = 'Нет';
        }
        $type = $request->input('type');
        $age = $request->input('age');
        $reserv_min = $request->input('reserv_min');
        if($reserv_min == NULL){
            $reserv_min = 1;
        }
        $reserv_day = $request->input('reserv_day');
        if($reserv_day == NULL){
            $reserv_day = 1;
        }
        $address = $request->input('address');
        $new = $request->input('new');
        if($new == NULL){
            $new= 'Нет';
        }
        $online = $request->input('online');
        if($online == NULL){
            $online = 'Нет';
        }
        $short_desc = $request->input('short_desc');
        if($short_desc == NULL){
            $short_desc = 'NULL';
        }
        $long_desc = $request->input('desc');
        if($long_desc == NULL){
            $long_desc = 'NULL';
        }
        $legend = $request->input('legend');
        if($legend == NULL){
            $legend = 'NULL';
        }
        $max_gamer_sum = $request->input('max_gamer_pay');
        $max_gamer_col = $request->input('max_gamer_col');
        $max_gamer_type = $request->input('type_pay');

        $create = new Cards();
        $create->name = $name;
        $create->min_gamer = $min_gamer;
        $create->max_gamer = $max_gamer;
        $create->complex = $complex;
        $create->fear = $fear;
        $create->phone = $phone;
        $create->actors = $actors;
        $create->und_pay = $und_pay;
        $create->type = $type;
        $create->age = $age;
        $create->reserv_minute = $reserv_min;
        $create->reserv_day = $reserv_day;
        $create->address = $address;
        $create->new = $new;
        $create->max_gamer_sum = $max_gamer_sum;
        $create->max_gamer_col = $max_gamer_col;
        $create->max_gamer_type = $max_gamer_type;
        $create->time = $time;

        $create->online = $online;
        $create->short_descript = $short_desc;
        $create->long_descript = $long_desc;
        $create->legend = $legend;
        $create->save();

        $quest_id = DB::table('cards')->max('id');

        $add_user_mig = new User_Card();
        $add_user_mig->user_id = $user_id;
        $add_user_mig->card_id = $quest_id;
        $add_user_mig->save();

        $add_mig = new Card_Address();
        $add_mig->card_id = $quest_id;
        $add_mig->address_id = $address;
        $add_mig->save();

        $quest = Cards::find($quest_id);
        $photo_count = Card_Photo::all()->where('card_id','=',$quest_id)->count();
        $user = User::find(Auth::id());

        return view('pages.settings.cvest.multimedia')
            ->with('photo_count',$photo_count)
            ->with('quest',$quest)
            ->with('user',$user);
    }

    public function restore_cvest(Request $request){
        $id = $request->get('id');
        $card = Cards::find($id);
        $cities = City::all();
        $oblasts = Oblast::all();
        $user_id = Auth::id();
        $photo_count = Card_Photo::all()->where('card_id','=',$id)->count();
        $user = User::find($user_id);

        return view('pages.settings.cvest.restore')
                        ->with('card',$card)
                        ->with('cities',$cities)
                        ->with('oblasts',$oblasts)
                        ->with('photo_count',$photo_count)
                        ->with('user',$user);
    }

    public function delete_cvest(Request $request){

        $id = $request->input('card_id');

        Cards::where('id','=',$id)->delete();

        $card_photo = Card_Photo::all()->where('card_id','=',$id);
        foreach ($card_photo as $card_f){
            $photo_id = $card_f->photo_id;
            Photos::where('id','=',$photo_id)->delete();
        }

        User_Card::where('card_id','=',$id)->delete();

        Card_Photo::where('card_id','=',$id)->delete();

        Card_Address::where('card_id','=',$id)->delete();

        return redirect('cards');

    }
}
