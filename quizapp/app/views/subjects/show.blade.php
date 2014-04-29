@extends('layouts/master')

@section('content')

@if(!is_null($subject))

<h1>{{$subject->subject}}</h1>
@else
	<h1>There is no subject with this id.</h1>
@endif

@stop