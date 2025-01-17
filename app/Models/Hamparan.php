<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hamparan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hamparan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_zona',
        'nama_hamparan',
        'latitude',
        'longitude'
    ];
    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona', 'id');
    }

    function plot()
    {
        return $this->hasMany(Plot::class, 'id_hamparan', 'id');
    }

    protected static function booted()
    {
        static::deleting(function ($hamparan) {
            $hamparan->plot()->delete();
        });
    }
}
