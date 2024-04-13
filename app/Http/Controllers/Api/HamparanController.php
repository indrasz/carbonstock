<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hamparan;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class HamparanController extends Controller
{
    //
    function get(Request $request){
        $data = Hamparan::with('zona');

        $id = $request->get('id_hamparan', NULL);
        if($id != NULL){
            $data = $data->where('id', $id);
        }

        $zona = $request->get('id_zona', NULL);
        if($zona != NULL){
            $data = $data->where('id_zona', $zona);
        }

        $data = $data->get();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'id_zona' => 'required',
            'nama_hamparan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $check_zona = Zona::where('id', $request->id_zona)->count();
        if($check_zona == 0){
            return $this->responses(false, 'gagal menambahkan, zona tidak ditemukan');
        }

        $inserts = Hamparan::create([
            'id_zona' => $request->id_zona,
            'nama_hamparan' => $request->nama_hamparan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function edit($id_hamparan, Request $request){
        $validator = Validator::make($request->all(), [
            'id_zona' => 'required',
            'nama_hamparan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $hamparan = Hamparan::where('id', $id_hamparan);
        if($hamparan->count() == 0){
            return $this->responses(false, 'gagal memperbaharui data, hamparan tidak ditemukan');
        }

        $check_zona = Zona::where('id', $request->id_zona)->count();
        if($check_zona == 0){
            return $this->responses(false, 'gagal menambahkan, zona tidak ditemukan');
        }

        $updates = $hamparan->update([
            'id_zona' => $request->id_zona,
            'nama_hamparan' => $request->nama_hamparan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $this->responses(true, 'Berhasil memperbarui data');
    }

    function delete($id_zona, $id_hamparan){
        $check_zona = Zona::where('id', $id_zona)->count();
        if($check_zona == 0){
            return $this->responses(false, 'Gagal menghapus data, zona tidak ditemukan');
        }

        $check_hamparan = Hamparan::where('id', $id_hamparan)->count();
        if($check_hamparan == 0){
            return $this->responses(false, 'Gagal menghapus data, hamparan tidak ditemukan');
        }

        $hamparan = Hamparan::where('id', $id_hamparan)->where('id_zona', $id_zona);
        if($hamparan->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, hamparan tidak terdapat pada zona');
        }

        $deletes = $hamparan->delete();
        return $this->responses(true, 'Berhasil menghapus data');
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
