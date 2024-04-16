<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'plot';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_hamparan',
        'nama_plot',
        'type_plot',
        'latitude',
        'longitude'
    ];

    function plot(){
        return $this->hasOne(MasterPlot::class, 'id', 'type_plot');
    }

    function hamparan(){
        return $this->hasOne(Hamparan::class, 'id', 'id_hamparan');
    }
}
