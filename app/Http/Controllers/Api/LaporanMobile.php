<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class LaporanMobile extends Controller
{
    //
    function add_subplot_a(Request $request){
        $inserts = SubplotA::create([
            'uuid' => $request->uuid,
            'plot_id' => $request->plot_id,
            'area_name' => $request->area_name,
            'plot_name' => $request->plot_name,
            'subplot_a_photo_url' => $request->subplot_a_photo_url,
            'updated_at' => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_b(Request $request){
        $inserts = SubplotB::create([
            'uuid' => $request->uuid,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "local_name" => $request->local_name,
            "bio_name" => $request->bio_name,
            "keliling" => $request->keliling,
            "diameter" => $request->diameter,
            "kerapatan_kayu" => $request->kerapatan_kayu,
            "biomass" => $request->biomass,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "subplot_b_photo_url" => $request->subplot_b_photo_url,
            "updated_at" => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_c(Request $request){
        $inserts = SubplotC::create([
            'uuid' => $request->uuid,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "local_name" => $request->local_name,
            "bio_name" => $request->bio_name,
            "keliling" => $request->keliling,
            "diameter" => $request->diameter,
            "kerapatan_kayu" => $request->kerapatan_kayu,
            "biomass" => $request->biomass,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "subplot_c_photo_url" => $request->subplot_c_photo_url,
            "updated_at" => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_d(Request $request){
        $inserts = SubplotD::create([
            "uuid" => $request->uuid,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "subplot_d_photo_url" => $request->subplot_d_photo_url,
            "updated_at" => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_a_semai(Request $request){
        $inserts = SubplotASemai::create([
            "uuid" => $request->uuid,
            "uuid_subplot_a" => $request->uuid_subplot_a,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "basah_total" => $request->basah_total,
            "basah_sample" => $request->basah_sample,
            "kering_total" => $request->kering_total,
            "kering_sample" => $request->kering_sample,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "updated_at" => $request->updated_at,
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_a_seresah(Request $request){
        $inserts = SubplotASeresah::create([
            "uuid" => $request->uuid,
            "uuid_subplot_a" => $request->uuid_subplot_a,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "basah_total" => $request->basah_total,
            "basah_sample" => $request->basah_sample,
            "kering_total" => $request->kering_total,
            "kering_sample" => $request->kering_sample,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "updated_at" => $request->updated_at,
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_a_tumbuhan_bawah(Request $request){
        $inserts = SubplotATumbuhanBawah::create([
            "uuid" => $request->uuid,
            "uuid_subplot_a" => $request->uuid_subplot_a,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "basah_total" => $request->basah_total,
            "basah_sample" => $request->basah_sample,
            "kering_total" => $request->kering_total,
            "kering_sample" => $request->kering_sample,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "updated_at" => $request->updated_at,
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_d_pohon(Request $request){
        $inserts = SubplotDPohon::create([
            "uuid" => $request->uuid,
            "uuid_subplot_d" => $request->uuid_subplot_d,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "local_name" => $request->local_name,
            "bio_name" => $request->bio_name,
            "keliling" => $request->keliling,
            "diameter" => $request->diameter,
            "kerapatan_kayu" => $request->kerapatan_kayu,
            "biomass" => $request->biomass,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "updated_at" => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_d_nekromas(Request $request){
        $inserts = SubplotDNekromas::create([
            "uuid" => $request->uuid,
            "uuid_subplot_d" => $request->uuid_subplot_d,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "diameter_pangkal" => $request->diameter_pangkal,
            "diameter_ujung" => $request->diameter_ujung,
            "panjang" => $request->panjang,
            "volume" => $request->volume,
            "biomass" => $request->biomass,
            "carbon_value" => $request->carbon_value,
            "carbon_absorb" => $request->carbon_absorb,
            "updated_at" => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function add_subplot_d_tanah(Request $request){
        $inserts = SubplotDTanah::create([
            "uuid" => $request->uuid,
            "uuid_subplot_d" => $request->uuid_subplot_d,
            "plot_id" => $request->plot_id,
            "area_name" => $request->area_name,
            "plot_name" => $request->plot_name,
            "kedalaman_sample" => $request->kedalaman_sample,
            "berat_jenis_tanah" => $request->berat_jenis_tanah,
            "organik_c_tanah" => $request->organik_c_tanah,
            "carbon_gr_cm" => $request->carbon_gr_cm,
            "carbon_ton_ha" => $request->carbon_ton_ha,
            "carbon_ton" => $request->carbon_ton,
            "carbon_absorb" => $request->carbon_absorb,
            "updated_at" => $request->updated_at
        ]);

        return $this->responses(true, 'Berhasil menambahkan data');
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
