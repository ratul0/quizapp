@extends('layouts.master')

@section('content')
@if(!is_null($topics))
<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'subjects.topics.questions.store','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Create a new Question</legend>


                  <div class="form-group">
          
                    {{Form::label('topic','Available Topics',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('topic',$topics,NULL,array('class'=>'form-control'));}}
                    </div>
                  </div>
                  





                  <div class="form-group">
                    {{Form::label('question', "Question", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('question', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your question"))}}
						
						          {{$errors->first('question')}}


                    </div>
                  </div>


                  <div class="form-group">
          
                    {{Form::label('difficulty','Difficulty',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('difficulty',$difficulty,NULL,array('class'=>'form-control'));}}
                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('choice1', "Choice 1", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice1', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice1"))}}
            
                      {{$errors->first('choice1')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('choice2', "Choice 2", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice2', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice2"))}}
            
                      {{$errors->first('choice2')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('choice3', "Choice 3", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice3', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice3"))}}
            
                      {{$errors->first('choice3')}}


                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('choice4', "Choice 4", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('choice4', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your choice4"))}}
            
                      {{$errors->first('choice4')}}


                    </div>
                  </div>


                  <div class="form-group">
          
                    {{Form::label('ans','Answer',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('ans',$answer,NULL,array('class'=>'form-control'));}}
                    </div>
                  </div>


                  <div class="form-group">
                    {{Form::label('explanation', "Explanation", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('explanation', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your explanation"))}}
            
                      {{$errors->first('explanation')}}


                    </div>
                  </div>

                 
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Create Question', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

@else
  <h1>There is no question with this id.</h1>
@endif


@stop