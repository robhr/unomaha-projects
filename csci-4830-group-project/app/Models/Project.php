<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Jul 2018 18:21:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Project
 * 
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $purchases
 *
 * @package App\Models
 */
class Project extends Eloquent
{
	protected $fillable = [
		'title', 'description'
	];

	public function purchases()
	{
		return $this->hasMany(\App\Models\Purchase::class);
	}
}
