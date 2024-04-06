<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tim extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tim';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    function anggota(){
        return $this->hasMany(AnggotaTim::class, 'id_tim', 'id');
    }

    public static function booted(): void 
    {
        static::deleting(function(Tim $tim){
            $tim->anggota()->delete();
        });
    }
}
