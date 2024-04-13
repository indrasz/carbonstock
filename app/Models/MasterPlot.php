<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPlot extends Model
{
    use HasFactory;
    protected $table = 'master_plot';
    protected $primaryKey = 'id';

    function subplot(){
        return $this->hasMany(MasterSubPlot::class, 'id_plot', 'id');
    }
}
