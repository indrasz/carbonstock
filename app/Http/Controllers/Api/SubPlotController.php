<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MasterSubPlot;
use App\Models\Plot;
use App\Models\SubPlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;

class SubPlotController extends Controller
{
    //
    function get(Request $request){
        $data = SubPlot::with('subplot');

        $id= $request->get('id', NULL);
        if($id != NULL){
            $data = $data->where('id', $id);
        }

        $type_plot = $request->get('type_plot', NULL);
        if($type_plot != NULL){
            $data = $data->whereHas('subplot', function($query) use($type_plot){
                $query->where('id_plot', $type_plot);
            });
        }

        $type_subplot = $request->get('type_subplot', NULL);
        if($type_subplot != NULL){
            $data = $data->where('type_subplot', $type_subplot);
        }

        $data = $data->get();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'id_plot' => 'required',
            'nama_subplot' => 'required',
            'id_master_subplot' => 'required',
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $plot = Plot::where('id', $request->id_plot);
        if($plot->count() == 0){
            return $this->responses(false, 'Gagal menambahkan data, plot tidak ditemukan');
        }

        $subplot = MasterSubPlot::where('id', $request->id_master_subplot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal menambahkan data, master subplot tidak ditemukan');
        }

        $subplot = $subplot->where('id_plot', $plot->get()[0]->type_plot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal menambahkan data, master subplot tidak terdaftar pada plot tersebut');
        }

        $inserts = SubPlot::create([
            'id_plot' => $request->id_plot,
            'nama_subplot' => $request->nama_subplot,
            'type_subplot' => $request->id_master_subplot,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function edit($id_subplot, Request $request){
        $validator = Validator::make($request->all(), [
            'id_plot' => 'required',
            'nama_subplot' => 'required',
            'id_master_subplot' => 'required',
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $plot = Plot::where('id', $request->id_plot);
        if($plot->count() == 0){
            return $this->responses(false, 'Gagal memperbaharui data, plot tidak ditemukan');
        }

        $subplot = MasterSubPlot::where('id', $request->id_master_subplot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal memperbaharui data, master subplot tidak ditemukan');
        }

        $subplot = $subplot->where('id_plot', $plot->get()[0]->type_plot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal memperbaharui data, master subplot tidak terdaftar pada plot tersebut');
        }

        $subplot = SubPlot::where('id', $id_subplot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal memperbaharui data, subplot tidak ditemukan');
        }

        $updates = $subplot->update([
            'id_plot' => $request->id_plot,
            'nama_subplot' => $request->nama_subplot,
            'type_subplot' => $request->id_master_subplot,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $this->responses(true, 'Berhasil memperbaharui data');
    }

    function delete($id_plot, $id_subplot){
        $check_plot = Plot::where('id', $id_plot)->count();
        if($check_plot == 0){
            return $this->responses(false, 'Gagal menghapus data, plot tidak ditemukan');
        }

        $subplot = SubPlot::where('id', $id_subplot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, subplot tidak ditemukan');
        }

        $subplot = $subplot->where('id_plot', $id_plot);
        if($subplot->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, subplot tidak terdaftar di plot tersebut');
        }

        $deletes = $subplot->delete();
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
