<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'templates';
    protected $primaryKey = 'id_templates';

    protected $fillable = [
        'name',
        'path',
        'order',
        'link_tutorial'
    ];

    public function styles()
    {
        return $this->hasMany(Style::class, 'id_templates');
    }

    public function scripts()
    {
        return $this->hasMany(Script::class, 'id_templates');
    }
}
