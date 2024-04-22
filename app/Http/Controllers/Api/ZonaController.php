<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MasterHutan;
use App\Models\Regional;
use App\Models\RegionalTim;
use App\Models\Tim;
use App\Models\Zona;
use App\Models\ZonaTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ZonaController extends Controller
{
    //
    function get(Request $request){
        $data = Zona::with('tim');

        $id_zona = $request->get('id_zona', NULL);
        if($id_zona != NULL){
            $data = $data->where('id', $id_zona);
        }

        $id_regional = $request->get('id_regional', NULL);
        if($id_regional != NULL){
            $data = $data->where('id_regional', $id_regional);
        }

        $data = $data->get();
        for($i = 0; $i < count($data); $i++){
            $dir_files = public_path('zona_'.$data[$i]->id);
            $files = array();
            if(is_dir($dir_files)){
                $list_files = scandir($dir_files);
                array_shift($list_files);
                array_shift($list_files);

                foreach($list_files as $list){
                    array_push($files, array(
                        'nama_file' => $list,
                        'path' => 'zona_'.$data[$i]->id.'/'.$list
                    ));
                }
            }
            $data[$i]->files = $files;
        }

        $data = $data;

        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(), [
            'id_regional' => 'required',
            'nama_zona' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        if(Regional::where('id', $request->id_regional)->count() == 0){
            return $this->responses(false, 'regional tidak ditemukan');
        }

        $jenis_hutan = $request->input('jenis_hutan', NULL);
        if($jenis_hutan != NULL){
            if(MasterHutan::where('id', $jenis_hutan)->count() == 0){
                return $this->responses(false, 'jenis hutan tidak ditemukan');
            }
        }

        $insert = Zona::create([
            'id_regional' => $request->id_regional,
            'nama_zona' => $request->nama_zona,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'jenis_hutan' => $jenis_hutan
        ]);

        if($request->hasFile('file')){
            $dir = public_path('zona_'.$insert->id);
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

        return $this->responses(true, 'Berhasil menambahkan zona');
    }

    function delete($id_regional, $id_zona){
        $check_regional = Regional::where('id', $id_regional)->count();
        if($check_regional == 0){
            return $this->responses(false, 'regional tidak ditemukan');
        }

        $zona = Zona::where('id', $id_zona);
        if($zona->count() == 0){
            return $this->responses(false, 'zona tidak ditemukan');
        }

        if($zona->where('id_regional', $id_regional)->count() == 0){
            return $this->responses(false, 'zona tidak berada pada regional tersebut');
        }

        $delete_tim_zona = ZonaTim::where('id_zona', $id_zona)->delete();
        $deletes = $zona->where('id_regional', $id_regional)->delete();

        return $this->responses(true, 'Berhasil menghapus zona');
    }

    function add_photo($id_zona, Request $request){
        $check_zona = Zona::where('id', $id_zona)->count();
        if($check_zona == 0){
            return $this->responses(false, 'Zona tidak ditemukan');
        }

        if($request->hasFile('file')){
            $dir = public_path('zona_'.$id_zona);
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

    function delete_photo($id_zona, $nama_file){
        $check_zona = Zona::where('id', $id_zona)->count();
        if($check_zona == 0){
            return $this->responses(false, 'Gagal menghapus photo, zona tidak ditemukan');
        }

        $dir = public_path('zona_'.$id_zona);
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

    function add_tim(Request $request){
        $validator = Validator::make($request->all(), [
            'id_zona' => 'required',
            'id_tim' => 'required'
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $zona = Zona::where('id', $request->id_zona);
        //check zona
        if($zona->count() == 0){
            return $this->responses(false, 'zona tidak ditemukan');
        }

        $check_tim = Tim::where('id', $request->id_tim)->count();
        if($check_tim == 0){
            return $this->responses(false, 'tim tidak ditemukan');
        }

        $check_regional_tim = RegionalTim::where('id_regional', $zona->get()[0]->id_regional)->where('id_tim', $request->id_tim)->count();
        if($check_regional_tim == 0){
            return $this->responses(false, 'tim tidak terdaftar pada wilayah regional zona');
        }

        $inserts = ZonaTim::create([
            'id_zona' => $request->id_zona,
            'id_tim' => $request->id_tim
        ]);

        return $this->responses(true, 'Berhasil menambahkan tim');
    }

    function delete_tim($id_zona, $id_tim){
        $check_zona = Zona::where('id', $id_zona)->count();
        if($check_zona == 0){
            return $this->responses(false, 'gagal menghapus, zona tidak ditemukan');
        }

        $check_tim = Tim::where('id', $id_tim)->count();
        if($check_tim == 0){
            return $this->responses(false, 'gagal menghapus, tim tidak ditemukan');
        }

        $zona_tim = ZonaTim::where('id_zona', $id_zona)->where('id_tim', $id_tim);
        if($zona_tim->count() == 0){
            return $this->responses(false, 'gagal menghapus, tim belum terdaftar pada zona');
        }

        $deletes = $zona_tim->delete();
        return $this->responses(false, 'Berhasil menghapus tim');
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
