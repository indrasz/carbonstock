<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotC extends Model
{
    use HasFactory;
    protected $table = 'subplot_c';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'uuid',
        "plot_id",
        "area_name",
        "plot_name",
        "local_name",
        "bio_name",
        "keliling",
        "diameter",
        "kerapatan_kayu",
        "biomass",
        "carbon_value",
        "carbon_absorb",
        "subplot_c_photo_url",
        "updated_at"
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }
}
