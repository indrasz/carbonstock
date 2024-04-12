<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterHutan extends Model
{
    use HasFactory;
    protected $table = 'master_hutan';
    protected $primaryKey = 'id';
}
