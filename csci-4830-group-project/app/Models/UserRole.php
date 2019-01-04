<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Jul 2018 18:21:31 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserRole
 * 
 * @property int $id
 * @property string $title
 * @property int $user_id
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class UserRole extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'title',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
