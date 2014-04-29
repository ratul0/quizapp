@extends('layouts/master')

@section('content')

@if(!is_null($question))

<h2>Question :</h2><h3>{{$question->question}}</h3>

<h2>Answer :</h2><h3>{{$answer[$question->ans]}}</h3>

<h2>Explanation :</h2><h3>{{$question->explanation}}</h3>

<h2>Difficulty :</h2><h3>{{$difficulty[$question->difficulty]}}</h3>

@else
	<h1>There is no topic with this id.</h1>
@endif

@stop