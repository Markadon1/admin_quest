<?php

namespace App\Http\Controllers;

use App\City;
use App\Oblast;
use App\Related\Card_Photo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function main(){

        return view('pages.main');

    }

    public function profile(){

        $oblasts = Oblast::all();

        $cities = City::all();

        $user = User::find(Auth::id());

        return view('pages.profile')
            ->with('user',$user)
            ->with('oblasts',$oblasts)
            ->with('cities',$cities);

    }

    public function workers(){

        $user = User::find(Auth::id());

        return view('pages.workers')
            ->with('user',$user);

    }

    public function cards(){

        $user = User::find(Auth::id());
        $cards_count = User::has('cards')->count();

        return view('pages.cards')
            ->with('user',$user)
            ->with('cards_count',$cards_count);

    }
}
