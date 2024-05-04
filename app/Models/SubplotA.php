<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotA extends Model
{
    use HasFactory;
    protected $table = 'subplot_a';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'plot_id',
        'area_name',
        'plot_name',
        'subplot_a_photo_url',
        'updated_at'
    ];

    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id', 'id');
    }

    public function subplotASemai()
    {
        return $this->hasOne(SubplotASemai::class, 'uuid_subplot_a', 'uuid');
    }

    public function subplotASeresah()
    {
        return $this->hasOne(SubplotASeresah::class, 'uuid_subplot_a', 'uuid');
    }

    public function subplotATumbuhanBawah()
    {
        return $this->hasOne(SubplotATumbuhanBawah::class, 'uuid_subplot_a', 'uuid');
    }
}
