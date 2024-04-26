<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotB extends Model
{
    use HasFactory;
    protected $table = 'subplot_b';
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
        "subplot_b_photo_url",
        "updated_at"
    ];
}
