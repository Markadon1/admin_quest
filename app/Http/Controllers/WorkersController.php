<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Workers;
use App\Cards;

use App\Related\User_Worker;
use App\Related\Worker_Payment;
use App\Related\Worker_Quest;

class WorkersController extends Controller
{

    public function redirect_to_create(){

        $user = User::find(Auth::id());

        return view('pages.workers.create')
            ->with('user',$user);

    }
    public function redirect_to_update(Request $request){

        $user = User::find(Auth::id());
        $id = $request->input('id');
        $worker = Workers::find($id);
        $worker_payment = Worker_Payment::all()->where('worker_id','=', $id)->count();


        return view('pages.workers.update')
            ->with('user',$user)
            ->with('worker',$worker)
            ->with('worker_payment',$worker_payment);

    }

    public function create(Request $request)
    {

        $logo = $request->file('logo_worker');

        if ($logo != NULL) {
            $filename = $logo->getClientOriginalName() . time();
            $logo->move('/images/workers_logo', $filename);
        }
        $id = $request->input('id');
        $name = $request->input('name');
        $position = $request->input('position');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $payment = $request->input('payment');
        $access = $request->input('access');
        $random_id = str_random(8);
        $worker_telegram = $request->input('worker_telegram');
        $worker_sms = $request->input('worker_sms');
        $change_quests = $request->input('worker_quest_change');

        if ($email == NULL) {
            $email = 'Не указан';
        }
        if ($phone == NULL) {
            $phone = 'Не указан';
        }
        if ($access == NULL) {
            $access = 'Нет';
        }
        if ($worker_telegram == NULL) {
            $worker_telegram = 'Нет';
        }
        if ($worker_sms == NULL) {
            $worker_sms = 'Нет';
        }

        if ($id == 0) {
            $worker = new Workers();
            $worker->name = $name;
            $worker->email = $email;
            $worker->phone = $phone;
            $worker->position = $position;
            $worker->access = $access;
            $worker->quests = $change_quests;
            $worker->telegram = $worker_telegram;
            $worker->sms = $worker_sms;

            if ($logo == NULL) {
                $worker->logo = 'NULL';
            }
            if ($logo != NULL) {
                $worker->logo = $filename;
            }

            $worker->random_id = $random_id;
            $worker->save();

            $worker_id = DB::table('workers')->max('id');

            $add_mig = new User_Worker();
            $add_mig->user_id = Auth::id();
            $add_mig->worker_id = $worker_id;
            $add_mig->save();

            if ($payment != 0) {
                $add_payment = new Worker_Payment();
                $add_payment->worker_id = $worker_id;
                $add_payment->payment_id = $payment;
                $add_payment->save();
            }

            if ($change_quests == 'Все') {

                $user = User::find(Auth::id());
                $cards = $user->cards;

                foreach ($cards as $card) {

                    $card_id = $card->id;

                    $add_quests = new Worker_Quest();
                    $add_quests->worker_id = $worker_id;
                    $add_quests->quest_id = $card_id;
                    $add_quests->save();

                }
            }

            if ($change_quests == 'Выбранные') {
                $quests = $request->worker_quest;
                if ($quests != 0) {
                    foreach ($quests as $card) {

                        $add_quests = new Worker_Quest();
                        $add_quests->worker_id = $worker_id;
                        $add_quests->quest_id = $card;
                        $add_quests->save();

                    }
                }
            }

            }
            if ($id != 0) {

                $worker = Workers::find($id);
                $worker->name = $name;
                $worker->email = $email;
                $worker->phone = $phone;
                $worker->position = $position;
                $worker->access = $access;
                $worker->quests = $change_quests;
                $worker->telegram = $worker_telegram;
                $worker->sms = $worker_sms;
                if ($logo == NULL) {
                    $worker->logo = 'NULL';
                }
                if ($logo != NULL) {
                    $worker->logo = $filename;
                }
                $worker->save();


                if ($payment != 0) {

                    Worker_Payment::where('worker_id', '=', $id)->delete();

                    $add_payment = new Worker_Payment();
                    $add_payment->worker_id = $id;
                    $add_payment->payment_id = $payment;
                    $add_payment->save();
                }
                if ($payment == 0) {

                    Worker_Payment::where('worker_id', '=', $id)->delete();

                }

                if ($change_quests == 'Все') {

                    $user = User::find(Auth::id());
                    $cards = $user->cards;


                    foreach ($cards as $card) {

                        $card_id = $card->id;

                        Worker_Quest::where('quest_id', '=', $card_id)->delete();

                        $add_quests = new Worker_Quest();
                        $add_quests->worker_id = $id;
                        $add_quests->quest_id = $card_id;
                        $add_quests->save();

                    }

                }

                if ($change_quests == 'Выбранные') {
                    $quests = $request->worker_quest;
                    if ($quests != 0) {
                        foreach ($quests as $card) {

                            Worker_Quest::where('quest_id', '=', $card)->delete();

                            $add_quests = new Worker_Quest();
                            $add_quests->worker_id = $id;
                            $add_quests->quest_id = $card;
                            $add_quests->save();

                        }
                    }
                }
                $request->session()->flash('message', 'Информация о сотруднике изменена');
                return redirect()->back();
            }
            $request->session()->flash('message', 'Сотрудник успешно добавлен!');
            return redirect('workers');

        }

    public function delete_quest(Request $request){

        $quest_id = $request->input('quest_id');
        $worker_id = $request->input('worker_id');

        Worker_Quest::where('quest_id','=',$quest_id)->delete();

        $worker = Workers::find($worker_id);

        echo view('ajax.worker_add_quest')
                    ->with('worker',$worker);
    }
}
