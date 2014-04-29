<?php 


class Subject extends Basemodel{

	public $timestamps = false;

	protected $guarded = [];

	public static $rules = [
		'subject'=>'required|max:100'
	];

	public function topics()
	{
		return $this->hasMany('Topic');
	}

}
