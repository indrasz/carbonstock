<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotD extends Model
{
    use HasFactory;
    protected $table = 'subplot_d';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "uuid",
        "plot_id",
        "area_name",
        "plot_name",
        "subplot_d_photo_url",
        "updated_at"
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }

    public function subplotDNekromas()
    {
        return $this->hasOne(SubplotDNekromas::class, 'uuid_subplot_d', 'uuid');
    }

    public function subplotDPohon()
    {
        return $this->hasOne(SubplotDPohon::class, 'uuid_subplot_d', 'uuid');
    }

    public function subplotDTanah()
    {
        return $this->hasOne(SubplotDTanah::class, 'uuid_subplot_d', 'uuid');
    }
}

