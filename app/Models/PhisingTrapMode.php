<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhisingTrapMode extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "phising_trap_modes";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];
}
