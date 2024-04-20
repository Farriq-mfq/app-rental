<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private readonly User $user)
    {
    }
    public function index()
    {
        return view('auth.login');
    }
    public function login_process(AuthRequest $authRequest)
    {
        $remember = ($authRequest->has('remember')) ? true : false;
        $credentials = $authRequest->only(['email', 'password']);
        $auth = Auth::attempt(array_merge($credentials, ['role' => 'admin']), $remember);
        if ($auth) {
            return redirect()->intended(route('dashboard'));
        } else {
            return to_route('login')->with('alert', ['message' => 'Pesan : Login gagal periksa kembali kredensial anda', 'type' => 'danger']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function register_process(AuthRegisterRequest $authRegisterRequest)
    {
        $register = $this->user->create([
            'nama' => $authRegisterRequest->nama,
            'email' => $authRegisterRequest->email,
            'password' => Hash::make($authRegisterRequest->password),
            'no_sim' => $authRegisterRequest->no_sim,
            'alamat' => $authRegisterRequest->alamat,
            'telp' => $authRegisterRequest->no_telp,
        ]);

        if ($register) {
            return back()->with('alert', ['message' => 'Register berhasil', 'type' => 'success']);
        } else {
            return back()->with('alert', ['message' => 'Gagal register', 'type' => 'danger']);
        }
    }
}
