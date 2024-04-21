<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periode extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'periode';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tgl_mulai',
        'tgl_berakhir',
        'visible'
    ];

    function regional(){
        return $this->hasMany(Regional::class, 'id_periode', 'id');
    }
}
