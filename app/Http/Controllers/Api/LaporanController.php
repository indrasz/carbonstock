<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hamparan;
use App\Models\laporan_semai;
use App\Models\laporan_serasah;
use App\Models\Plot;
use App\Models\SubPlot;
use App\Models\SubplotA;
use App\Models\SubplotASemai;
use App\Models\SubplotASeresah;
use App\Models\SubplotATumbuhanBawah;
use App\Models\SubplotB;
use App\Models\SubplotC;
use App\Models\SubplotD;
use App\Models\SubplotDNekromas;
use App\Models\SubplotDPohon;
use App\Models\SubplotDTanah;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    //
    function add_semai(Request $request){
        $validator = Validator::make($request->all(), [
            'id_subplot' => 'required',
            'berat_basah_total' => 'required',
            'berat_kering_total' => 'required',
            'berat_kering_sample' => 'required',
            'kandungan_karbon' => 'required',
            'serapan_co2' => 'required',
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $check_subplot = SubPlot::where('id', $request->id_subplot)->count();
        if($check_subplot == 0){
            return $this->responses(false, 'Gagal menambahkan data, subplot tidak ditemukan');
        }

        $inserts = laporan_semai::create([
            'id_subplot' => $request->id_subplot,
            'berat_basah_total' => $request->berat_basah_total,
            'berat_kering_total' => $request->berat_kering_total,
            'berat_kering_sample' => $request->berat_kering_sample,
            'kandungan_karbon' => $request->kandungan_karbon,
            'serapan_co2' => $request->serapan_co2,
            'catatan' => $request->catatan
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function delete_semai($id_subplot, $id_semai){
        $check_subplot = SubPlot::where('id', $id_subplot)->count();
        if($check_subplot == 0){
            return $this->responses(false, 'Gagal menghapus data, subplot tidak ditemukan');
        }

        $semai = laporan_semai::where('id', $id_semai);
        if($semai->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, semai tidak ditemukan');
        }

        $semai = $semai->where('id_subplot', $id_subplot);
        if($semai->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, semai tidak terdaftar pada subplot');
        }

        $deletes = $semai->delete();
        return $this->responses(true, 'Berhasil menghapus data');
    }

    function get_semai(Request $request){
        $data = laporan_semai::with('subplot');

        $id = $request->get('id', NULL);
        if($id != NULL){
            $data = $data->where('id', $id);
        }

        $subplot = $request->get('id_subplot', NULL);
        if($subplot != NULL){
            $data = $data->where('id_subplot');
        }

        $plot = $request->get('id_plot', NULL);
        if($plot != NULL){
            $data = $data->whereHas('subplot', function($query)use($plot){
                $query->where('id_plot', $plot);
            });
        }

        $hamparan = $request->get('id_hamparan', NULL);
        if($hamparan != NULL){
            $data = $data->whereHas('subplot.plot', function($query)use($hamparan){
                $query->where('id_hamparan', $hamparan);
            });
        }

        $zona = $request->get('id_zona', NULL);
        if($zona != NULL){
            $data = $data->whereHas('subplot.plot.hamparan', function($query)use($zona){
                $query->where('id_zona', $zona);
            });
        }

        $data = $data->get();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function add_serasah(Request $request){
        $validator = Validator::make($request->all(), [
            'id_subplot' => 'required',
            'berat_basah_total' => 'required',
            'berat_kering_total' => 'required',
            'berat_kering_sample' => 'required',
            'kandungan_karbon' => 'required',
            'serapan_co2' => 'required',
        ]);

        if($validator->fails()){
            return $this->responses(false, implode(",", $validator->messages()->all()));
        }

        $check_subplot = SubPlot::where('id', $request->id_subplot)->count();
        if($check_subplot == 0){
            return $this->responses(false, 'Gagal menambahkan data, subplot tidak ditemukan');
        }

        $inserts = laporan_serasah::create([
            'id_subplot' => $request->id_subplot,
            'berat_basah_total' => $request->berat_basah_total,
            'berat_kering_total' => $request->berat_kering_total,
            'berat_kering_sample' => $request->berat_kering_sample,
            'kandungan_karbon' => $request->kandungan_karbon,
            'serapan_co2' => $request->serapan_co2,
            'catatan' => $request->catatan
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function delete_serasah($id_subplot, $id_serasah){
        $check_subplot = SubPlot::where('id', $id_subplot)->count();
        if($check_subplot == 0){
            return $this->responses(false, 'Gagal menghapus data, subplot tidak ditemukan');
        }

        $serasah = laporan_serasah::where('id', $id_serasah);
        if($serasah->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, serasah tidak ditemukan');
        }

        $serasah = $serasah->where('id_subplot', $id_subplot);
        if($serasah->count() == 0){
            return $this->responses(false, 'Gagal menghapus data, serasah tidak terdaftar pada subplot');
        }

        $deletes = $serasah->delete();
        return $this->responses(true, 'Berhasil menghapus data');
    }

    function get_serasah(Request $request){
        $data = laporan_serasah::with('subplot');

        $id = $request->get('id', NULL);
        if($id != NULL){
            $data = $data->where('id', $id);
        }

        $subplot = $request->get('id_subplot', NULL);
        if($subplot != NULL){
            $data = $data->where('id_subplot');
        }

        $plot = $request->get('id_plot', NULL);
        if($plot != NULL){
            $data = $data->whereHas('subplot', function($query)use($plot){
                $query->where('id_plot', $plot);
            });
        }

        $hamparan = $request->get('id_hamparan', NULL);
        if($hamparan != NULL){
            $data = $data->whereHas('subplot.plot', function($query)use($hamparan){
                $query->where('id_hamparan', $hamparan);
            });
        }

        $zona = $request->get('id_zona', NULL);
        if($zona != NULL){
            $data = $data->whereHas('subplot.plot.hamparan', function($query)use($zona){
                $query->where('id_zona', $zona);
            });
        }

        $data = $data->get();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }

    function get_laporan_by_regional($id_regional){
        $subplot_b = array();
        $subplot_c = array();
        $subplot_a_semai = array();
        $subplot_a_seresah = array();
        $subplot_a_tumbuhan_bawah = array();
        $subplot_d_nekromas = array();
        $subplot_d_pohon = array();
        $subplot_d_tanah = array();

        $list_zona = Zona::where('id_regional', $id_regional)->get(); //get laporan from regional
        foreach($list_zona as $zona){
            $list_hamparan = Hamparan::where('id_zona', $zona->id)->get(); //get laporan from zona
            foreach($list_hamparan as $hamparan){
                $list_plot = Plot::where('id_hamparan', $hamparan->id)->get(); //get laporan from hamparan
                foreach($list_plot as $plot){//get laporan from plot
                    $list_subplot_a = SubplotA::where('plot_id', $plot->id)->get(); 
                    foreach($list_subplot_a as $subplot_a){
                        $list_subplot_a_semai = SubplotASemai::where('uuid_subplot_a', $subplot_a->uuid)->get();
                        foreach($list_subplot_a_semai as $semai){
                            array_push($subplot_a_semai, $semai);
                        }

                        $list_subplot_a_seresah = SubplotASeresah::where('uuid_subplot_a', $subplot_a->uuid)->get();
                        foreach($list_subplot_a_seresah as $seresah){
                            array_push($subplot_a_seresah, $seresah);
                        }

                        $list_subplot_a_tumbuhan_bawah = SubplotATumbuhanBawah::where('uuid_subplot_a', $subplot_a->uuid)->get();
                        foreach($list_subplot_a_tumbuhan_bawah as $tb){
                            array_push($subplot_a_tumbuhan_bawah, $tb);
                        }
                    }

                    $list_subplot_b = SubplotB::where('plot_id', $plot->id)->get();
                    foreach($list_subplot_b as $sb){
                        array_push($subplot_b, $sb);
                    }

                    $list_subplot_c = SubplotC::where('plot_id', $plot->id)->get();
                    foreach($list_subplot_c as $sc){
                        array_push($subplot_c, $sc);
                    }

                    $list_subplot_d = SubplotD::where('plot_id', $plot->id)->get();
                    foreach($list_subplot_d as $subplot_d){
                        $list_subplot_d_nekromas = SubplotDNekromas::where('uuid_subplot_d', $subplot_d)->get();
                        foreach($list_subplot_d_nekromas as $sdn){
                            array_push($subplot_d_nekromas, $sdn);
                        }

                        $list_subplot_d_pohon = SubplotDPohon::where('uuid_subplot_d', $subplot_d)->get();
                        foreach($list_subplot_d_pohon as $sdp){
                            array_push($subplot_d_pohon, $sdp);
                        }

                        $list_subplot_d_tanah = SubplotDTanah::where('uuid_subplot_d', $subplot_d)->get();
                        foreach($list_subplot_d_tanah as $sdt){
                            array_push($subplot_d_tanah, $sdt);
                        }
                    }
                }
            }
        }

        //array object
        return compact("subplot_b","subplot_c", "subplot_a_semai", "subplot_a_seresah", "subplot_a_tumbuhan_bawah", "subplot_d_nekromas", "subplot_d_pohon", "subplot_d_tanah");
    }
}
