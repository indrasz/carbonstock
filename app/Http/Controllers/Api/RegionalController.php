<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MasterHutan;
use App\Models\Regional;
use App\Models\RegionalTim;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LDAP\Result;

class RegionalController extends Controller
{
    //
    function get(Request $request){
        $data = Regional::with('tim', 'type_hutan');

        $id = $request->get('id', NULL);
        if($id != NULL){
            $data->where('id', $id);
        }

        $data = $data->get();

        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'nama_regional' => 'required',
            'jenis_hutan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        if(MasterHutan::where('id', $request->jenis_hutan)->count() == 0){
            return $this->responses(false, 'Jenis hutan tidak ditemukan');
        }

        $inserts = Regional::create([
            'nama_regional' => $request->nama_regional,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jenis_hutan' => $request->jenis_hutan
        ]);

        return $this->responses(true, 'Berhasil menambahkan regional');
    }

    function edit($id, Request $request){
        $check_regional = Regional::where('id', $id)->count();
        if($check_regional == 0) {
            return $this->responses(false, 'Regional tidak ditemukan');
        }

        $validator = Validator::make($request->all(), [
            'nama_regional' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $updated = Regional::where('id', $id)->update([
            'nama_regional' => $request->nama_regional,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);

        return $this->responses(true, 'Berhasil memperbaharui data');
    }

    function delete($id){
        $check_regional = Regional::where('id', $id)->count();
        if($check_regional == 0) {
            return $this->responses(false, 'Regional tidak ditemukan');
        }

        $deletes = Regional::where('id', $id)->delete();

        return $this->responses(true, 'Berhasil menghapus regional');
    }

    function add_tim(Request $request){
        $validator = Validator::make($request->all(), [
            'id_regional' => 'required',
            'id_tim' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        if(Regional::where('id', $request->id_regional)->count() == 0){
            return $this->responses(false, 'Regional tidak ditemukan');
        }

        if(Tim::where('id', $request->id_tim)->count() == 0){
            return $this->responses(false, 'tim tidak ditemukan');
        }

        if(RegionalTim::where('id_regional', $request->id_regional)->where('id_tim', $request->id_tim)->count() > 0){
            return $this->responses(false, 'Gagal menambahkan, tim telah terdaftar di regional');
        }

        $inserts = RegionalTim::create([
            'id_regional' => $request->id_regional,
            'id_tim' => $request->id_tim
        ]);

        return $this->responses(true, 'Berhasil menambahkan tim regional');
    }

    function delete_tim($id_regional, $id_tim){
        if(Regional::where('id', $id_regional)->count() == 0){
            return $this->responses(false, 'Regional tidak ditemukan');
        }

        if(Tim::where('id', $id_tim)->count() == 0){
            return $this->responses(false, 'tim tidak ditemukan');
        }
        
        $data = RegionalTim::where('id_regional', $id_regional)->where('id_tim', $id_tim);
        if($data->count() == 0){
            return $this->responses(false, 'gagal menghapus,tim belum terdaftar di regional');
        }

        $deletes = $data->delete();

        return $this->responses(true, 'Berhasil menghapus tim dari regional');
    }
    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
