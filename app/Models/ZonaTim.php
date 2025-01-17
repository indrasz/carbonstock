<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZonaTim extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'zona_tim';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_zona',
        'id_tim'
    ];

    public function namaTim()
    {
        return $this->belongsTo(Tim::class, 'id_tim', 'id');
    }

}
