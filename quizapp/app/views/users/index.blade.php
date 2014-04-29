@extends('layouts/master')

@section('content')
	<div id="ask">

		@if(Auth::check())

      		<h1>Hello {{Auth::user()->email}}</h1>

            @else
            	<h1>please login to enter admin panel.</h1>


		@endif
	</div>


@stop


