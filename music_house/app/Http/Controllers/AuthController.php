<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function regForm() {
        return view('register');
    }


    public function register(Request $request) {
        $request->validate([
            'name' => ['regex:/^[А-ЯЁа-яё -]+$/u', 'required'],
            'surname' => ['regex:/^[А-ЯЁа-яё -]+$/u', 'required'],
            'patronymic' => ['regex:/^[А-ЯЁа-яё -]+$/u', 'nullable'],
            'login' => ['regex:/^[A-Za-z0-9-]+$/u', 'required', 'unique:users'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);


        $user = new User;


        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->patronymic = $request->patronymic;
        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


        $user->save();


        $order = new Order;
        $order->user_id = $user->id;
        $order->sum = 0;
        $order->save();


        return redirect()->route('loginForm');
    }


    public function loginForm() {
        return view('login');
    }


    public function login(Request $request) {
        $credentials = $request->validate([
        'login' => ['required'],
        'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::check() && Auth::user()->is_admin) {
                return redirect()->route('admin')->with(['info'=>'Вы успешно вошли под администратором']);
            } else {
                return redirect('/')->with(['info'=>'Вы успешно вошли']);
            }
        }


        return back()->withErrors([
            'login' => 'Не совпали данные',
        ])->onlyInput('login');
    }


    public function logout(Request $request) {
        Auth::logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect('/')->with(['info'=>'Вы вышли из аккаунта']);
    }
}
