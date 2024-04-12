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
        'tanggal_selesai'
    ];

    function tim(){
        return $this->hasMany(RegionalTim::class, 'id_regional', 'id');
    }
}
