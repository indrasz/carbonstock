<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotDPohon extends Model
{
    use HasFactory;
    protected $table = 'subplot_d_pohon';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "uuid",
        "uuid_subplot_d",
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
        "updated_at"
    ];
    public function subplotD()
    {
        return $this->belongsTo(SubplotD::class, 'uuid_subplot_d', 'uuid');
    }
}
