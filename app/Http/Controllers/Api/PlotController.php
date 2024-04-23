<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hamparan;
use App\Models\MasterPlot;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PlotController extends Controller
{
    //
    function get(Request $request){
        $data = Plot::with('plot');

        $id = $request->get('id', NULL);
        if($id != NULL){
            $data = $data->where('id', $id);
        }

        $type_plot = $request->get('type_plot', NULL);
        if($type_plot != NULL){
            $data = $data->where('type_plot', $type_plot);
        }

        $data = $data->get();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'id_hamparan' => 'required',
            'nama_plot' => 'required',
            'id_master_plot' => 'required',
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $check_hamparan = Hamparan::where('id', $request->id_hamparan)->count();
        if($check_hamparan == 0){
            return $this->responses(false, 'Gagal menambahkan data, hamparan tidak ditemukan');
        }

        $check_type_plot = MasterPlot::where('id', $request->id_master_plot)->count();
        if($check_type_plot == 0){
            return $this->responses(false, 'Gagal menambahkan data, master plot tidak ditemukan');
        }

        $inserts = Plot::create([
            'id_hamparan' => $request->id_hamparan,
            'nama_plot' => $request->nama_plot,
            'type_plot' => $request->id_master_plot,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        if($request->hasFile('file')){
            $dir = public_path('plot_'.$inserts->id);
            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            foreach($request->file('file') as $file){
                $names = Str::random(6).'_'.$file->getClientOriginalName();
                $list_files = scandir($dir);
                array_shift($list_files);
                array_shift($list_files);

                $start = 0;
                $is_found = true;
                while($is_found){
                    if(in_array($names, $list_files)){
                        $names = Str::random(6).'_'.$file->getClientOriginalName();
                        $is_found = true;
                    }else {
                        $is_found = false;
                    }
                }

                $file->move($dir, $names);
            }
        }

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function edit($id_plot, Request $request){
        $validator = Validator::make($request->all(), [
            'id_hamparan' => 'required',
            'nama_plot' => 'required',
            'id_master_plot' => 'required',
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $check_hamparan = Hamparan::where('id', $request->id_hamparan)->count();
        if($check_hamparan == 0){
            return $this->responses(false, 'Gagal memperbaharui data, hamparan tidak ditemukan');
        }

        $check_type_plot = MasterPlot::where('id', $request->id_master_plot)->count();
        if($check_type_plot == 0){
            return $this->responses(false, 'Gagal memperbaharui data, master plot tidak ditemukan');
        }

        $plot = Plot::where('id', $id_plot);
        if($plot->count() == 0){
            return $this->responses(false, 'Gagal memperbaharui data, plot tidak ditemukan');
        }

        $updates = $plot->update([
            'id_hamparan' => $request->id_hamparan,
            'nama_plot' => $request->nama_plot,
            'type_plot' => $request->id_master_plot,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $this->responses(true, 'Berhasil memperbaharui data');
    }

    function delete($id_hamparan, $id_plot){
        $check_hamparan = Hamparan::where('id', $id_hamparan)->count();
        if($check_hamparan == 0){
            return $this->responses(false, 'Gagal menghapus data, hamparan tidak ditemukan');
        }

        $plot = Plot::where('id', $id_plot);
        if($plot->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, plot tidak ditemukan');
        }

        $plot = $plot->where('id_hamparan', $id_hamparan);
        if($plot->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, plot tidak terdaftar pada hamparan tersebut');
        }

        $deletes = $plot->delete();
        return $this->responses(true, 'Berhasil menghapus data');
    }

    function add_photo($id_plot, Request $request){
        $check_zona = Plot::where('id', $id_plot)->count();
        if($check_zona == 0){
            return $this->responses(false, 'Zona tidak ditemukan');
        }

        if($request->hasFile('file')){
            $dir = public_path('plot_'.$id_plot);
            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            foreach($request->file('file') as $file){
                $names = Str::random(6).'_'.$file->getClientOriginalName();
                $list_files = scandir($dir);
                array_shift($list_files);
                array_shift($list_files);

                $start = 0;
                $is_found = true;
                while($is_found){
                    if(in_array($names, $list_files)){
                        $names = Str::random(6).'_'.$file->getClientOriginalName();
                        $is_found = true;
                    }else {
                        $is_found = false;
                    }
                }

                $file->move($dir, $names);
            }

            return $this->responses(true, 'Berhasil menambahkan data');
        }else {
            return $this->responses(false, 'Files is required');
        }
    }

    function delete_photo($id_plot, $nama_file){
        $check_zona = Plot::where('id', $id_plot)->count();
        if($check_zona == 0){
            return $this->responses(false, 'Gagal menghapus photo, zona tidak ditemukan');
        }

        $dir = public_path('plot_'.$id_plot);
        if(is_dir($dir)){
            $list_files = scandir($dir);
            array_shift($list_files);
            array_shift($list_files);

            if(in_array($nama_file, $list_files)){
                unlink($dir.'\\'.$nama_file);
                return $this->responses(true, 'Berhasil menghapus file');
            }else {
                return $this->responses(false, 'Gagal menghapus file, file tidak ditemukan');
            }
        }else {
            return $this->responses(false, 'Gagal menghapus file, belum ada file pada zona ini');
        }
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
