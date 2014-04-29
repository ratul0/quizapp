<?php 


class Topic extends Basemodel{

	public $timestamps = false;

	protected $guarded = [];

	public static $rules = [
		'title'=>'required|max:100',
		'description'=>'required|max:100'
	];

	public function subject()
	{
		return $this->belongsTo('Subject');
	}


}
