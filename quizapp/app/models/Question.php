<?php 


class Question extends Basemodel{

	public $timestamps = false;

	protected $guarded = [];

	public static $rules = [
		'topic'=>'required',
		'question'=>'required|min:10|max:1000',
		'difficulty'=>'required',
		'choice1'=>'required',
		'choice2'=>'required',
		'choice3'=>'required',
		'choice4'=>'required',
		'ans'=>'required',
		'explanation'=>'required'
	];

	



	
	public static function unsolved()
	{
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(3);
	}
	public static function yourQuestions()
	{
		return static::where('user_id','=',Auth::user()->id)->paginate(3);
	}
}
