<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Jul 2018 18:21:22 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Purchase
 * 
 * @property int $id
 * @property int $customer_id
 * @property int $project_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Customer $customer
 * @property \App\Models\Project $project
 *
 * @package App\Models
 */
class Purchase extends Eloquent
{
	protected $casts = [
		'customer_id' => 'int',
		'project_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
        'project_id',
        'amount'
	];

	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class);
	}

	public function project()
	{
		return $this->belongsTo(\App\Models\Project::class);
	}
}
