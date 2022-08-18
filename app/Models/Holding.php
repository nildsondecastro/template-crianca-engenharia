<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    use HasFactory;

    protected $table = 'holdings';
    protected $primaryKey = 'id_holdings';

    protected $fillable = [
        'name',
        'order',
        'id_templates'
    ];
}
