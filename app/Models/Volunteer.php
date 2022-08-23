<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Volunteer
 * 
 * @property int $id_volunteers
 * @property int $id_users
 * @property int $id_events
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Event $event
 *
 * @package App\Models
 */
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
