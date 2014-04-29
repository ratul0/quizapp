@extends('layouts.master')

@section('content')

@if(!is_null($subject))
<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'subjects.update','method' => 'put','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Edit Subject</legend>
                  <div class="form-group">
                    {{Form::label('subject', "Subject", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('subject', $subject->subject,$attributes = array('class'=>'form-control','placeholder'=>"Type your subject"))}}
						
						          {{$errors->first('subject')}}


                    </div>
                  </div>

                  {{Form::hidden('subject_id',$subject->id)}}

                 
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Edit Subject', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

@else
	<h1>There is no subject with this id.</h1>
@endif


@stop