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
        'id_periode',
        'nama_regional',
        'jenis_hutan',
        'latitude',
        'longitude'
    ];

    function tim(){
        return $this->hasMany(RegionalTim::class, 'id_regional', 'id');
    }

    function zona(){
        return $this->hasMany(Zona::class, 'id_regional', 'id');
    }

    function type_hutan(){
        return $this->hasOne(MasterHutan::class, 'id', 'jenis_hutan');
    }

    function periode()
    {
        return $this->hasOne(Periode::class, 'id', 'id_periode');
    }

    public static function booted(): void
    {
        static::deleting(function (Regional $regional) {
            // Hapus entitas terkait RegionalTim
            $regional->tim()->delete();

            // Hapus entitas terkait Zona dan Hamparan
            $regional->zona()->each(function ($zona) {
                $zona->delete();
            });
        });

    }
}
