<?php 

class SubjectsController extends BaseController{


	public function index()
	{

		return View::make('subjects.view')
			->with('subjects',Subject::all())
			->with('title','Quiz - Subjects');
	}

	public function create()
	{
		return View::make('subjects.create')
			->with('title','Quiz - Create');
	}

	public function store()
	{


		$validation = Subject::validate(Input::all());

		if($validation->passes()){

			$subject = ['subject'=>Input::get('subject')];

			Subject::create($subject);

			return Redirect::route('subjects.index')
				->with('message','New Subject Created!')
				->with('subjects',Subject::all())
				->with('title','Quiz - Subjects');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);

		
	}



	public function show($id)
	{


		return View::make('subjects.show')
			->with('title','Quiz - Subject')
			->with('subject',Subject::find($id));
	}


	public function edit($id)
	{
		return View::make('subjects.edit')
			->with('title','Quiz - Edit Subject')
			->with('subject',Subject::find($id));
	}





	public function update()
	{
		$id = Input::get('subject_id');




		$validation = Subject::validate(Input::all());

		$subjectUpdate = ['subject'=>Input::get('subject')];
		
		if($validation->passes()){
			 Subject::find($id)->update($subjectUpdate);


			return Redirect::route('subjects.index')
				->with('message','Your subject has been updated!')
				->with('subjects',Subject::all())
				->with('title','Quiz - Subjects');
				
		}else{
			return Redirect::route('subjects.edit',$id)->withErrors($validation);
		}
	}


	public function deleteSubject($id)
	{

		Subject::destroy($id);
		$tests = Topic::where('subject_id','=',$id)->get(['id']);
		Topic::where('subject_id','=',$id)->delete();
		

		foreach ($tests as $test) {

			Question::where('topic_id','=',$test->id)->delete();
		}

		return Redirect::route('subjects.index')
				->with('message','Subject Deleted!')
				->with('subjects',Subject::all())
				->with('title','Quiz - Subjects');
	}






}