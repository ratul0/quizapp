<?php 

class TopicsController extends BaseController{


	private function getSubjectWithId(){
		$subjects = Subject::all();

		$store = array();
		
		foreach ($subjects as $subject) {
			$store[$subject->id] = $subject->subject;


		}

		return $store;
	}


	private function countingQuestionByDifficulty(){

		$getTopicsForDifficulty = Topic::all();
		$all = ['easy'=>[],'medium'=>[],'hard'=>[]];

		if(!$getTopicsForDifficulty->isEmpty()){

			
			
			foreach ($getTopicsForDifficulty as $getTopicForDifficulty) {

				$all['easy'][$getTopicForDifficulty->id] = Question::where('topic_id',$getTopicForDifficulty->id)
													->where('difficulty','=','1')->count();
				$all['medium'][$getTopicForDifficulty->id] = Question::where('topic_id',$getTopicForDifficulty->id)
														->where('difficulty','=','2')->count();
				$all['hard'][$getTopicForDifficulty->id] = Question::where('topic_id',$getTopicForDifficulty->id)
														->where('difficulty','=','3')->count();
				


			}

			return $all;


		}
		
	}

	public function index()
	{
		
		

		$countDifficulty = $this->countingQuestionByDifficulty();

		//dd($countDifficulty['hard'][2]);

		return View::make('topics.view')
			->with('topics',Topic::all())
			->with('subject',$this->getSubjectWithId())
			->with('countDifficulty',$countDifficulty)
			->with('title','Quiz - Topics');
	}

	public function create()
	{

		
		return View::make('topics.create')
			->with('title','Quiz - Create')
			->with('subjects',$this->getSubjectWithId());
	}

	public function store()
	{




		$validation = Topic::validate(Input::all());

		if($validation->passes()){ 

			$topic = ['subject_id'=>Input::get('subject'),
				'title'=>Input::get('title'),
				'description'=>Input::get('description')];

			Topic::create($topic);

			return Redirect::route('subjects.topics.index')
				->with('message','New Topic Created!')
				->with('subjects',Topic::all())
				->with('title','Quiz - Topics');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);

		
	}



	public function show($subjectId,$topicId)
	{


		return View::make('topics.show')
			->with('title','Quiz - Show')
			->with('topic',Topic::find($topicId));
	}


	public function edit($subjectId,$topicId)
	{
		return View::make('topics.edit')
			->with('title','Quiz - Edit Subject')
			->with('subjects',$this->getSubjectWithId())
			->with('topic',Topic::find($topicId));
	}





	public function update()
	{
		$subjectId = Input::get('subject_id');
		$topicId = Input::get('topic_id');




		$validation = Topic::validate(Input::all());



		$topicUpdate = ['subject_id'=>$subjectId,
				'title'=>Input::get('title'),
				'description'=>Input::get('description')];
		
		if($validation->passes()){
			 Topic::find($topicId)->update($topicUpdate);


			return Redirect::route('subjects.topics.index')
				->with('message','Your topic has been updated!')
				->with('topics',Topic::all())
				->with('subject',$this->getSubjectWithId())
				->with('title','Quiz - Topics');
				
		}else{
			return Redirect::route('subjects.topics.edit',$parameters = [$subjectId,$topicId])->withErrors($validation);
		}
	}


	public function deleteTopic($subjectId,$topicId)
	{

		Topic::destroy($topicId);
		Question::where('topic_id','=',$topicId)->delete();
				return Redirect::route('subjects.topics.index')
				->with('message','Topic Deleted!')
				->with('subjects',Topic::all())
				->with('title','Quiz - Topics');
	}

}