<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoldingItem extends Model
{
    use HasFactory;

    protected $table = 'holdings_items';
    protected $primaryKey = 'id_holdings_items';

    protected $fillable = [
        'type',
        'order',
        'path_img',
        'text',
        'path_file',
        'id_holdings',
    ];
}
