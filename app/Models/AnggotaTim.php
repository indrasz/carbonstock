<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnggotaTim extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'anggota_tim';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_tim',
        'id_user'
    ];

    function users(){
        return $this->hasOne(Users::class, 'id', 'id_user');
    }
}
