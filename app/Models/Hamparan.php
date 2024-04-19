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

    // function zona(){
    //     return $this->hasOne(Zona::class, 'id', 'id_zona');
    // }

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'id_zona', 'id');
    }
}
