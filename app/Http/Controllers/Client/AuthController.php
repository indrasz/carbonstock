<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Users;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginWithEmail()
    {
        return view('pages.auth.login-with-email');
    }


    public function register()
    {
        return view('pages.auth.register');
    }
    public function validateUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                toastr()->error($validator->messages()->all());
                // return $this->responses(false, implode(", ", $validator->messages()->all()));
            }

            $users = Users::where('email', $request->email)->where('password', md5($request->password))->where('is_active', 1)->get();

            // dd($users);

            if (count($users) > 0) {

                // dd($request->session()->put('user', $users));
                $request->session()->put('user', $users);
                // dd($request->session()->get('user'));
                toastr()->success('Anda berhasil masuk');
                return redirect()->route('dashboard');
            } else {
                toastr()->error('Email dan password tidak cocok');
                return redirect()->route('login');
            }
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->route('login');
        }
    }
    public function createUser(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'telepon' => 'required|string|max:20',
                'jenis_kelamin' => 'required|string|max:10',
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            $id = Str::random(6);
            while (Users::where('id', $id)->count() > 0) {
                $id = Str::random(6);
            }
            $user = Users::create([
                'id' => $id,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'telepon' => $request->telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'password' => md5($request->password),
                'role' => 'USER',
            ]);

            $request->session()->put('user', $user);

            toastr()->success('Anda berhasil registrasi, silahkan login jika terverifikasi sebagai admin');
            return redirect()->route('login');
        } catch (Exception $e) {
            toastr()->error('Terjadi kesalahan saat membuat akun: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');

        $request->session()->flush();
        return redirect()->route('login');
    }
}
