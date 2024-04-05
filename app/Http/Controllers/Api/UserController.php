<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    //add user
    public function addUser(Request $request){
        //validated input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()]
        ]);

        //if fails, show input missed
        if($validator->fails()){
            return $this->responses(false, implode(", ", $validator->messages()->all()));
        }

        //validated register email
        $check_email = Users::where('email', $request->email)->count();
        if($check_email > 0){
            return $this->responses(false, 'Email telah terdaftar');
        }

        //random string for id user
        $id = Str::random(6);
        while(Users::where('id', $id)->count() > 0){
            $id = Str::random(6);
        }

        //insert data to database
        $inserts = Users::create([
            'id' => $id,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'telepon' => $request->telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'password' => md5($request->password)
        ]);

        return $this->responses(true, 'Berhasil mendaftarkan akun');
    }

    function login(Request $request){
        //validated input
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        //show all missed input
        if($validator->fails()){
            return $this->responses(false, implode(", ", $validator->messages()->all()));
        }

        //validated user register
        $users = Users::where('email', $request->email)->where('password', md5($request->password))->where('is_active', 1)->get();
        //available user
        if(count($users) > 0){
            return $this->responses(true, 'Berhasil login', $users[0]);
        }else {
            return $this->responses(false, 'Gagal Login. Username atau password salah');
        }
    }

    function getUser(Request $request){
        $data = Users::all();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function setActiveUser($idUser, Request $request){
        $check_user = Users::where('id', $idUser)->count();
        if($check_user == 0){
            return $this->responses(false, 'user tidak ditemukan');
        }

        //check query url 
        $status = $request->get('status', NULL);
        if($status == NULL){
            return $this->responses(false, 'status tidak ditemukan');
        }

        //check inputan query url 
        if(!($status == 0 || $status == 1)){
            return $this->responses(false, 'status tidak dikenali. hanya boleh bernilai 0 atau 1');
        }

        $updates = Users::where('id', $idUser)->update([
            'is_active' => $status
        ]);

        return $this->responses(true, 'Berhasil mengubah status active user');
    }

    function deleteUser($idUser){
        $check_user = Users::where('id', $idUser)->count();
        if($check_user == 0){
            return $this->responses(false, 'id user tidak ditemukan');
        }
        
        $delete = Users::where('id', $idUser)->delete();
        return $this->responses(true, 'Berhasil menghapus user');
    }

    //default respponse all request
    public function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
