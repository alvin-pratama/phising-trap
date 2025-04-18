<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Target extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "target";
    protected $primaryKey = 'id';
    protected $fillable = [
        'target',
        'count_target',
    ];
}
