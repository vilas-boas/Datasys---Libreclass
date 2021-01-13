<?php namespace App;

class FinalExam extends \Illuminate\Database\Eloquent\Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'offer_id',
		'user_id',
		'value',
	];

	public function setValueAttribute($value)
	{
		$this->attributes['value'] = (float) $value;
	}
}
