<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotDTanah extends Model
{
    use HasFactory;
    protected $table = 'subplot_d_tanah';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "uuid",
        "uuid_subplot_d",
        "plot_id",
        "area_name",
        "plot_name",
        "kedalaman_sample",
        "berat_jenis_tanah",
        "organik_c_tanah",
        "carbon_gr_cm",
        "carbon_ton_ha",
        "carbon_ton",
        "carbon_absorb",
        "updated_at"
    ];
    public function subplotD()
    {
        return $this->belongsTo(SubplotD::class, 'uuid_subplot_d', 'uuid');
    }
}
