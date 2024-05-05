<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotASemai extends Model
{
    use HasFactory;
    protected $table = 'subplot_a_semai';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "uuid",
        "uuid_subplot_a",
        "plot_id",
        "area_name",
        "plot_name",
        "basah_total",
        "basah_sample",
        "kering_total",
        "kering_sample",
        "carbon_value",
        "carbon_absorb",
        "updated_at"
    ];
    public function subplotA()
    {
        return $this->belongsTo(SubplotA::class, 'uuid_subplot_a', 'uuid');
    }
    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }
}
