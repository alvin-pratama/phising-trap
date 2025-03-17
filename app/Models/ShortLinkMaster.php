<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShortLinkMaster extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "short_link_service";
    protected $primaryKey = 'id';
    protected $fillable = [
        'service_name',
        'func',
    ];
}
