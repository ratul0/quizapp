@extends('layouts.master')

@section('content')
@if(!is_null($subjects))
<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'subjects.topics.store','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Create a new Topic</legend>


                  <div class="form-group">
          
                    {{Form::label('subject','Available Subjects',array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::select('subject',$subjects,NULL,array('class'=>'form-control'));}}
                    </div>
                  </div>
                  





                  <div class="form-group">
                    {{Form::label('title', "Title", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::text('title', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your title"))}}
						
						          {{$errors->first('title')}}


                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('description', "Description", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('description', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your description"))}}
            
                      {{$errors->first('description')}}


                    </div>
                  </div>

                 
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Create Subject', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

@else
  <h1>There is no subject with this id.</h1>
@endif


@stop