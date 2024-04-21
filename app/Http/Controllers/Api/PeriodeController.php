<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class PeriodeController extends Controller
{
    //
    function get(Request $request){
        $data = Periode::with('regional');

        $id = $request->get('id', NULL);
        if($id != NULL){
            $data = $data->where('id', $id);
        }

        $visible = $request->get('visible', NULL);
        if($visible != NULL){
            $data = $data->where('visible', $visible);
        }

        $data = $data ->get();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'tgl_mulai' => 'required',
            'tgl_berakhir' => 'required',
            'visible' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $inserts = Periode::create([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_berakhir' => $request->tgl_berakhir,
            'visible' => $request->visible
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function edit($id_periode, Request $request){
        $validator = Validator::make($request->all(), [
            'tgl_mulai' => 'required',
            'tgl_berakhir' => 'required',
            'visible' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $periode = Periode::where('id', $id_periode);
        if($periode->count() == 0){
            return $this->responses(false, 'Gagal memperbaharui data, periode tidak ditemukan');
        }

        $updates = $periode->update([
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_berakhir' => $request->tgl_berakhir,
            'visible' => $request->visible
        ]);

        return $this->responses(true, 'Berhasil memperbaharui data');
    }

    function delete($id_periode){
        $periode = Periode::where('id', $id_periode);
        if($periode->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, periode tidak ditemukan');
        }

        $deletes = $periode->delete();
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
