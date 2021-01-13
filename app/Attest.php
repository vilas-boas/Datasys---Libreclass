<?php namespace App;

class Attest extends \Illuminate\Database\Eloquent\Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'institution_id',
		'student_id',
		'date',
		'days',
		'description',
	];

	public function setDaysAttribute($value)
	{
		$this->attributes['days'] = (int) $value;
	}
}
