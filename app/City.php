<?php namespace App;

class City extends \Illuminate\Database\Eloquent\Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'state_id',
	];
}
