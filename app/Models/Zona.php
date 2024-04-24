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

    public function regional()
    {
        return $this->belongsTo(Regional::class, 'id_regional', 'id');
    }

    function hamparan()
    {
        return $this->hasMany(Hamparan::class, 'id_zona', 'id');
    }

    function tim(){
        return $this->hasMany(ZonaTim::class, 'id_zona', 'id');
    }

    protected static function booted()
    {
        static::deleting(function ($zona) {
            $zona->hamparan()->delete();
        });
    }
}
