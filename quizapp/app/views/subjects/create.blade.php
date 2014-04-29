@extends('layouts.master')

@section('content')

<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'subjects.store','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Create a new Subject</legend>
                  <div class="form-group">
                    {{Form::label('subject', "Subject", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('subject', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your subject"))}}
						
						          {{$errors->first('subject')}}


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

@stop