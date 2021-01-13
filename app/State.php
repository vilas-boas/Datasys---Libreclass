<?php namespace App;

class State extends \Illuminate\Database\Eloquent\Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'country_id',
		'name',
		'short',
	];
}
