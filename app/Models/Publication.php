<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publication
 * 
 * @property int $id_publications
 * @property int $order
 * @property string $name
 * @property string $link
 * @property int $id_events
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Event $event
 *
 * @package App\Models
 */
class Publication extends Model
{
	protected $table = 'publications';
	protected $primaryKey = 'id_publications';

	protected $casts = [
		'order' => 'int',
		'id_events' => 'int'
	];

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
