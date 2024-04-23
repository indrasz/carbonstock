<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user';
    protected $primaryKey = 'id';


    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'telepon',
        'jenis_kelamin',
        'email',
        'password'
    ];

    // function tim(){
    //     return $this->hasMany(Tim::with('anggota')->whereHas())
    // }
}
