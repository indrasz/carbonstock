<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regional extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'regional';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_regional',
        'tanggal_mulai',
        'tanggal_selesai',
        'jenis_hutan'
    ];

    function tim(){
        return $this->hasMany(RegionalTim::class, 'id_regional', 'id');
    }

    function type_hutan(){
        return $this->hasOne(MasterHutan::class, 'id', 'jenis_hutan');
    }
}
