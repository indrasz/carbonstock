<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zona extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'zona';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_regional',
        'nama_zona',
        'jenis_hutan',
        'latitude',
        'longitude'
    ];

    function tim(){
        return $this->hasMany(ZonaTim::class, 'id_zona', 'id');
    }
}
