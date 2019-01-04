<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Jul 2018 18:21:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Log extends Eloquent
{
	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'text'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
