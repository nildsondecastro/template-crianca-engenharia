<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
	protected $table = 'publications';
	protected $primaryKey = 'id_publications';

	protected $casts = [];

	protected $fillable = [
		'order',
		'name',
		'link',
		'id_events'
	];

	public function event()
	{
		return $this->belongsTo(Event::class, 'id_events');
	}
}
