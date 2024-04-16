<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class laporan_serasah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'laporan_serasah';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_subplot',
        'berat_basah_total',
        'berat_kering_total',
        'berat_kering_sample',
        'kandungan_karbon',
        'serapan_co2',
        'catatan'
    ];

    function subplot(){
        return $this->hasOne(SubPlot::class, 'id', 'id_subplot');
    }
}
