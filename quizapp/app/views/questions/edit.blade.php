@extends('layouts.master')

@section('content')
@if(!is_null($question))
<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'subjects.topics.questions.update','method' => 'put','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Edit a Question</legend>


                  <div class="form-group">
          
                    {{Form::label('topic','Available Topics',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('topic',$topics,$question->topic_id,array('class'=>'form-control'));}}
                    </div>
                  </div>
                  





                  <div class="form-group">
                    {{Form::label('question', "Question", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('question', $question->question,$attributes = array('class'=>'form-control','placeholder'=>"Type your question"))}}
						
						          {{$errors->first('question')}}


                    </div>
                  </div>


                  <div class="form-group">
          
                    {{Form::label('difficulty','Difficulty',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('difficulty',$difficulty,$question->difficulty,array('class'=>'form-control'));}}
                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('choice1', "Choice 1", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice1', $question->choice1,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice1"))}}
            
                      {{$errors->first('choice1')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('choice2', "Choice 2", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice2', $question->choice2,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice2"))}}
            
                      {{$errors->first('choice2')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('choice3', "Choice 3", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice3', $question->choice3,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice3"))}}
            
                      {{$errors->first('choice3')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('choice4', "Choice 4", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice4', $question->choice4,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice4"))}}
            
                      {{$errors->first('choice4')}}


                    </div>
                  </div>


                  <div class="form-group">
          
                    {{Form::label('ans','Answer',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('ans',$answer,$question->ans,array('class'=>'form-control'));}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('explanation', "Explanation", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('explanation', $question->explanation,$attributes = array('class'=>'form-control','placeholder'=>"Type your explanation"))}}
            
                      {{$errors->first('explanation')}}


                    </div>
                  </div>

                 {{Form::hidden('subject_id',$subject_id)}}
                 {{Form::hidden('topic_id',$question->topic_id)}}
                 {{Form::hidden('question_id',$question->id)}}
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Edit Question', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

@else
  <h1>There is no question with this id.</h1>
@endif


@stop