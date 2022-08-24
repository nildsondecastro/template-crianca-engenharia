<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
	protected $table = 'volunteers';
	protected $primaryKey = 'id_volunteers';

	protected $casts = [
		'id_users' => 'int',
		'id_events' => 'int'
	];

	protected $fillable = [
		'id_users',
		'id_events'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_users');
	}

	public function event()
	{
		return $this->belongsTo(Event::class, 'id_events');
	}
}
