<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionalTim extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'regional_tim';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_regional',
        'id_tim'
    ];
}
