<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTim;
use App\Models\Tim;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimController extends Controller
{
    //
    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $inserts = Tim::create([
            'nama' => $request->nama
        ]);

        return $this->responses(true, 'Berhasil menambahkan tim'); 
    }

    function get(){
        $data = Tim::all();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function delete($id){
        $check_tim = Tim::where('id', $id)->count();
        if($check_tim == 0){
            return $this->responses(false, 'Tim tidak ditemukan');
        }

        $deletes = Tim::where('id', $id)->delete();
        return $this->responses(true, 'Berhasil menghapus tim');
    }

    function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'nama' => 'required'
        ]);

        $check_tim = Tim::where('id', $request->id)->count();
        if($check_tim == 0){
            return $this->responses(false, 'Tim tidak ditemukan');
        }

        $updates = Tim::where('id', $request->id)->update([
            'nama' => $request->nama
        ]);

        return $this->responses(true, 'Berhasil mengubah data tim');
    }

    function addAnggotaTim(Request $request){
        $validator = Validator::make($request->all(), [
            'id_tim' => 'required',
            'id_user' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $check_tim = Tim::where('id', $request->id_tim)->count();
        if($check_tim == 0){
            return $this->responses(false, 'id tim tidak ditemukan');
        }

        $check_user = Users::where('id', $request->id_user)->count();
        if($check_user == 0){
            return $this->responses(false, 'id user tidak ditemukan');
        }

        $check_anggota_terdaftar = AnggotaTim::where('id_tim', $request->id_tim)->where('id_user', $request->id_user)->count();
        if($check_anggota_terdaftar > 0){
            return $this->responses(false, 'gagal menambahkan. user sudah menjadi anggota');
        }

        $inserts = AnggotaTim::create([
            'id_tim' => $request->id_tim,
            'id_user' => $request->id_user
        ]);

        return $this->responses(true, 'Berhasil menambahkan anggota tim');
    }

    function getAnggotaTim($idTim){
        if(Tim::with('anggota', 'anggota.users')->where('id', $idTim)->count() == 0){
            return $this->responses(false, 'id tim tidak ditemukan');
        }
        $data = Tim::with('anggota', 'anggota.users')->where('id', $idTim)->get();

        return $this->responses(true, 'Berhasil mendapatkan anggota', $data);
    }



    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
