<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'plot';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_hamparan',
        'nama_plot',
        'type_plot',
        'latitude',
        'longitude'
    ];

    function plot(){
        return $this->hasOne(MasterPlot::class, 'id', 'type_plot');
    }

    function hamparan(){
        return $this->hasOne(Hamparan::class, 'id', 'id_hamparan');
    }

    public function subplotA()
    {
        return $this->hasMany(SubplotA::class, 'plot_id', 'id');
    }
    public function subplotASeresah()
    {
        return $this->hasMany(SubplotASeresah::class, 'plot_id', 'id');
    }

    public function subplotASemai()
    {
        return $this->hasMany(SubplotASemai::class, 'plot_id', 'id');
    }

    public function subplotATumbuhanBawah()
    {
        return $this->hasMany(SubplotATumbuhanBawah::class, 'plot_id', 'id');
    }

    public function subplotB()
    {
        return $this->hasMany(SubplotB::class, 'plot_id', 'id');
    }

    public function subplotC()
    {
        return $this->hasMany(SubplotC::class, 'plot_id', 'id');
    }

    public function subplotD()
    {
        return $this->hasMany(SubplotD::class, 'plot_id', 'id');
    }
    public function subplotDNekromas()
    {
        return $this->hasMany(SubplotDNekromas::class, 'plot_id', 'id');
    }

    public function subplotDPohon()
    {
        return $this->hasMany(SubplotDPohon::class, 'plot_id', 'id');
    }

    public function subplotDTanah()
    {
        return $this->hasMany(SubplotDTanah::class, 'plot_id', 'id');
    }

    function periode()
    {
        return $this->hasOneThrough(Periode::class, Regional::class, 'id', 'id', 'id_hamparan', 'id_periode')
        ->join('zona', 'regional.id', '=', 'zona.id_regional')
        ->join('hamparan', 'zona.id', '=', 'hamparan.id_zona');
    }

    protected static function booted()
    {
        static::deleting(function ($plot) {
            $plot->subplotA()->delete();
            $plot->subplotASeresah()->delete();
            $plot->subplotASemai()->delete();
            $plot->subplotATumbuhanBawah()->delete();
            $plot->subplotB()->delete();
            $plot->subplotC()->delete();
            $plot->subplotD()->delete();
            $plot->subplotDNekromas()->delete();
            $plot->subplotDPohon()->delete();
            $plot->subplotDTanah()->delete();
        });
    }
}
