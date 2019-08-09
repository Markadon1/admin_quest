<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function create(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',]);

        $add = new User();
        $add->name = $request->input('name');
        $add->email = $request->input('email');
        $add->password = bcrypt($request->input('password'));
        $add->phone = $request->input('phone');
        $add->verified = 0;
        $add->save();

        $user_id = DB::table('users')->max('id');

        $user = User::find($user_id);

        Mail::to($add)->send(new UserRegistered($add));

        $request->session()->flash('message', 'На Вашу почту отправлено письмо, которое содержит ссылку для подтверждения регистрации! Для продолжения перейдите по ссылке из письма!');

        return view('auth.confirm.resend')
            ->with('user',$user);
    }

    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();

        $user = User::whereToken($token)->first();

        User::whereToken($token)->firstOrFail()->cleanToken();


        $request->session()->flash('message', 'Поздравляем! Учетная запись успешно подтверждена.');

        return view('auth.confirm.success')
            ->with('user',$user);
    }

    public function success(Request $request){

        $id = $request->input('id');

        Auth::loginUsingId($id,true);

        return redirect('/');
    }

    public function resend(Request $request){

        $user_id = $request->input('id');

        $user = User::find($user_id);
        $user->email = $request->input('email');
        $user->save();

        Mail::to($user)->send(new UserRegistered($user));

        $request->session()->flash('message', 'На Вашу почту отправлено повторное письмо, с ссылкой для подтверждения регистрации! Для продолжения перейдите по ссылке из письма!');

        return view('auth.confirm.resend')
            ->with('user',$user);
    }
}
