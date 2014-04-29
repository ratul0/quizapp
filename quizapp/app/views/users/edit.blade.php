@extends('layouts/master')

@section('content')









	<div class="well">
              {{Form::open(array('class'=>'bs-example form-horizontal'))}}

                <fieldset>
                  <legend>Register</legend>

                  <div class="form-group">
                    {{Form::label('email', "Email", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::text('email', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your Email Address"))}}
						
						{{$errors->first('email')}}


                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('password', "Password", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::password('password',$attributes = array('class'=>'form-control','placeholder'=>"Type your Password"))}}
						
						{{$errors->first('password')}}


                    </div>
                  </div>

                  <div class="form-group">
                    {{Form::label('password_confirmation', "Confirm Password", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::password('password_confirmation',$attributes = array('class'=>'form-control','placeholder'=>"Confirm Password"))}}
						
						{{$errors->first('password_confirmation')}}


                    </div>
                  </div>
                  
                 
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Register', $attributes = array('class'=>'btn btn-primary'))}}
                    </div>
                  </div>
                </fieldset>
              {{Form::close()}}
            </div> 

@stop