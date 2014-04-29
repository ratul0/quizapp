<?php 

class QuestionsController extends BaseController{


	private function getTopicWithId(){
		$topics = Topic::all();

		$store = array();
		
		foreach ($topics as $topic) {
			$store[$topic->id] = $topic->title;


		}

		return $store;
	}
/*For removing the topics which has no questions*/
	private function getTopicWithQuestionId(){
		$topics = Topic::all();

		$store = array();
		
		foreach ($topics as $topic) {
			$check = Question::where('topic_id',$topic->id)->get();
			if(!$check->isEmpty()){
				$store[$topic->id] = $topic->title;
			}
			


		}

		return $store;
	}



	private function difficultyType()
	{
		$difficulty= ['1'=>'easy','2'=>'medium','3'=>'hard'];
		return $difficulty;
	}

	private function answerNo()
	{
		$answer= ['1'=>1,'2'=>2,'3'=>3,'4'=>4];
		return $answer;
	}

	private function getSubjectId(){
		$topics = Topic::all();

		$subject=[];

		foreach($topics as $topic){
			$subject[$topic->id]= $topic->subject_id;
		}

		return $subject;
	}




	public function index()
	{
		//dd(new DateTime());
		return View::make('questions.view')
			->with('questions',Question::all())
			->with('subject',$this->getSubjectId())
			->with('topics',$this->getTopicWithQuestionId())
			->with('difficulty',$this->difficultyType())
			->with('title','Quiz - Questions');
	}


	public function create()
	{

		
		return View::make('questions.create')
			->with('title','Quiz - Create')
			->with('difficulty',$this->difficultyType())
			->with('answer',$this->answerNo())
			->with('topics',$this->getTopicWithId());
	}

	public function store()
	{




		$validation = Question::validate(Input::all());

		if($validation->passes()){ 

			$question = ['topic_id'=>Input::get('topic'),
				'question'=>Input::get('question'),
				'choice1'=>Input::get('choice1'),
				'choice2'=>Input::get('choice2'),
				'choice3'=>Input::get('choice3'),
				'choice4'=>Input::get('choice4'),
				'difficulty'=>Input::get('difficulty'),
				'ans'=>Input::get('ans'),
				'explanation'=>Input::get('explanation')
				];

			Question::create($question);

			$datetime=new DateTime();
			
			 Topic::where('id', Input::get('topic'))->update(array('date' => $datetime->format('Y/m/d')));

			return Redirect::route('subjects.topics.questions.index')
				->with('questions',Question::all())
				->with('topics',$this->getTopicWithQuestionId())
				->with('difficulty',$this->difficultyType())
				->with('title','Quiz - Questions');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);

		
	}


	public function show($subjectId,$topicId,$questionId)
	{


		return View::make('questions.show')
			->with('title','Quiz - Show')
			->with('answer',$this->getAnswer($questionId))
			->with('difficulty',$this->difficultyType())
			->with('question',Question::find($questionId));
	}


	private function getAnswer($questionId){
		$question = Question::find($questionId)->first();

		$ans = ['1'=>$question->choice1,'2'=>$question->choice2,'3'=>$question->choice3,'4'=>$question->choice4];

		return $ans;
	}



	public function edit($subjectId,$topicId,$questionId)
	{
		return View::make('questions.edit')
			->with('title','Quiz - Edit Question')
			->with('difficulty',$this->difficultyType())
			->with('answer',$this->answerNo())
			->with('subject_id',$subjectId)
			->with('question',Question::find($questionId))
			->with('topics',$this->getTopicWithId());


	}


	public function update()
	{

		
		$subjectId = Input::get('subject_id');
		$topicId = Input::get('topic_id');
		$questionId = Input::get('question_id');




		$validation = Question::validate(Input::all());

		if($validation->passes()){ 

			$questionUpdate = ['topic_id'=>Input::get('topic'),
				'question'=>Input::get('question'),
				'choice1'=>Input::get('choice1'),
				'choice2'=>Input::get('choice2'),
				'choice3'=>Input::get('choice3'),
				'choice4'=>Input::get('choice4'),
				'difficulty'=>Input::get('difficulty'),
				'ans'=>Input::get('ans'),
				'explanation'=>Input::get('explanation')
				];

			 Question::find($questionId)->update($questionUpdate);

			 $datetime=new DateTime();
			
			 Topic::where('id', Input::get('topic'))->update(array('date' => $datetime->format('Y/m/d')));


			return Redirect::route('subjects.topics.questions.index')
				->with('message','Your question has been updated!')
				->with('questions',Question::all())
				->with('topics',$this->getTopicWithQuestionId())
				->with('difficulty',$this->difficultyType())
				->with('title','Quiz - Questions');
				
		}else{
			return Redirect::route('subjects.topics.questions.edit',$parameters = [$subjectId,$topicId,$questionId])->withErrors($validation);
		}
	}

	public function deleteQuestion($subjectId,$topicId,$questionId)
	{
		Question::destroy($questionId);
				return Redirect::route('subjects.topics.questions.index')
				->with('message','Question Deleted!')
				->with('questions',Question::all())
				->with('subject',$this->getSubjectId())
				->with('topics',$this->getTopicWithQuestionId())
				->with('difficulty',$this->difficultyType())
				->with('title','Quiz - Questions');
	}


}