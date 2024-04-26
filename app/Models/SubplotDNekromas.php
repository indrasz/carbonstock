<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotDNekromas extends Model
{
    use HasFactory;
    protected $table = 'subplot_d_nekromas';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "uuid",
        "uuid_subplot_d",
        "plot_id",
        "area_name",
        "plot_name",
        "diameter_pangkal",
        "diameter_ujung",
        "panjang",
        "volume",
        "biomass",
        "carbon_value",
        "carbon_absorb",
        "updated_at"
    ];
}
