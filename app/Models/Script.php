<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;

    protected $table = 'scripts';
    protected $primaryKey = 'id_scripts';

    protected $fillable = [
        'local_path',
        'link',
        'order',
        'id_templates'
    ];
}
