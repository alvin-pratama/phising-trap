<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrapingUrl extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "traping_url";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'short_link_service_id',
        'phising_trap_mode_id',
        'url_source',
        'url_custom',
    ];
}
