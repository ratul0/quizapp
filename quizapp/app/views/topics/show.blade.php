@extends('layouts/master')

@section('content')

@if(!is_null($topic))

<h1>{{$topic->title}}</h1>
<h4>{{$topic->description}}</h4>
@else
	<h1>There is no topic with this id.</h1>
@endif

@stop