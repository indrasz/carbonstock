<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubPlot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'subplot';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_plot',
        'nama_subplot',
        'type_subplot',
        'latitude',
        'longitude'
    ];

    function subplot(){
        return $this->hasOne(MasterSubPlot::class, 'id', 'type_subplot');
    }
}
