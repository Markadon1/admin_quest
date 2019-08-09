<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Profile;
use App\User;
use App\Oblast;
use App\City;

use App\Related\User_Profile;
class ProfileController extends Controller
{

    public function redirect_to_create(Request $request){

        $user = User::find(Auth::id());

        if($user->info == 0){
            echo view('pages.profile.profile_create')
            ->with('user',$user);
        }
        if($user->info == 1){
            echo view('pages.profile.profile_update')
                ->with('user',$user);
        }
    }

    public function create(Request $request){

        $id = $request->input('id');


        $web = $request->input('web');
        if($web == NULL){
            $web = 'NULL';
        }
        $telegram = $request->input('telegram');
        if($telegram == NULL){
            $telegram = 'NULL';
        }
        $youtube = $request->input('youtube');
        if($youtube == NULL){
            $youtube = 'NULL';
        }
        $facebook = $request->input('facebook');
        if($facebook == NULL){
            $facebook = 'NULL';
        }

        $yandex = $request->input('yandex');
        if($yandex == NULL){
            $yandex = 'Не указана';
        }

        $google = $request->input('google');
        if($google == NULL){
            $google = 'NULL';
        }

        $key_sms = $request->input('key_sms');
        if($key_sms == NULL){
            $key_sms = 'NULL';
        }

        $name_sms = $request->input('name_sms');
        if($name_sms == NULL){
            $name_sms = 'NULL';
        }

        $calendar = $request->input('calendar');
        $cancel_calendar = $request->input('cancel_calendar');

        $email_req = $request->input('email_req');
        if($email_req == NULL){
            $email_req = 'Нет';
        }
        if($cancel_calendar == NULL){
            $cancel_calendar = 'Нет';
        }

        if($id == 0){
        $add = new Profile();
        $add->user_id = Auth::id();
        $add->name = $request->input('name');
        $add->min_hour = $request->input('min_hour');
        $add->max_hour = $request->input('max_hour');
        $add->telegram = $telegram;
        $add->web = $web;
        $add->youtube = $youtube;
        $add->facebook = $facebook;
        $add->yandex = $yandex;
        $add->google = $google;
        $add->key_sms = $key_sms;
        $add->name_sms = $name_sms;
        $add->calendar = $calendar;
        $add->email_req = $email_req;
        $add->cancel_calendar = $cancel_calendar;
        $add->save();

        $max = DB::table('info')->max('id');

        $add_mig = new User_Profile();
        $add_mig->user_id = Auth::id();
        $add_mig->info_id = $max;
        $add_mig->save();

        $add_info_token = User::find(Auth::id());
        $add_info_token->info = 1;
        $add_info_token->save();
        }
        else{
            $add = Profile::find($id);
            $add->user_id = Auth::id();
            $add->name = $request->input('name');
            $add->min_hour = $request->input('min_hour');
            $add->max_hour = $request->input('max_hour');
            $add->telegram = $telegram;
            $add->youtube = $youtube;
            $add->facebook = $facebook;
            $add->yandex = $yandex;
            $add->google = $google;
            $add->key_sms = $key_sms;
            $add->name_sms = $name_sms;
            $add->calendar = $calendar;
            $add->email_req = $email_req;
            $add->cancel_calendar = $cancel_calendar;
            $add->save();
        }
        return redirect('profile');


    }
}
