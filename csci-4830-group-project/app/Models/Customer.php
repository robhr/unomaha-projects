<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Jul 2018 18:21:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string $username
 * @property string $license_key
 * @property string $package
 * @property \Carbon\Carbon $expires_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $purchases
 *
 * @package App\Models
 */
class Customer extends Eloquent
{
	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'username',
		'license_key',
		'package',
		'expires_at'
	];

	public function purchases()
	{
		return $this->hasMany(\App\Models\Purchase::class);
	}
}
