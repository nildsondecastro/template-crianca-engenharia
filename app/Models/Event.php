<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';
	protected $primaryKey = 'id_events';

	protected $casts = [
		'active' => 'bool'
	];

	protected $dates = [
		'start_registration_volunteers',
		'end_registration_volunteers',
		'start_registration_schools',
		'end_registration_schools'
	];

	protected $fillable = [
		'name',
		'description',
		'active',
		'start_registration_volunteers',
		'end_registration_volunteers',
		'start_registration_schools',
		'end_registration_schools'
	];

	public function publications()
	{
		return $this->hasMany(Publication::class, 'id_events');
	}

	public function volunteers()
	{
		return $this->hasMany(Volunteer::class, 'id_events');
	}
}
