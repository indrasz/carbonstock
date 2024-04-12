<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MasterHutan;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    function getHutan(){
        $data = MasterHutan::all();
        return $this->responses(true, 'Berhasil mendapatkan data', $data);
    }

    function responses($status, $message, $data = array()){
        return json_encode(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ), JSON_PRETTY_PRINT);
    }
}
