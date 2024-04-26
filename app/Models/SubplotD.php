<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubplotD extends Model
{
    use HasFactory;
    protected $table = 'subplot_d';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "uuid",
        "plot_id",
        "area_name",
        "plot_name",
        "subplot_d_photo_url",
        "updated_at"
    ];
}
