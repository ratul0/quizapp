@extends('layouts/master')

@section('content')
	<div id="question">

		@if(Auth::check())
			@if(!$topics->isEmpty())
	      		<div class="bs-example table-responsive">
              		<table class="table table-striped table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th>Title</th>
	                    <th>Description</th>
	                    <th>Subject</th>
	                    <th>Easy</th>
	                    <th>Medium</th>
	                    <th>Hard</th>
	                    <th>View</th>
	                    <th>Edit</th>
	                    <th>Delete</th>
	                  </tr>
	                </thead>
                	<tbody>
					
                		@foreach($topics as $topic )
							<tr>
	                			<td>{{e($topic->title)}}</td>

	                			<td>{{e($topic->description)}}</td>

	                			<td>{{e($subject[$topic->subject_id])}}</td>


	                			<td>{{$countDifficulty['easy'][$topic->id]}}</td>
	                			<td>{{$countDifficulty['medium'][$topic->id]}}</td>
	                			<td>{{$countDifficulty['hard'][$topic->id]}}</td>
	                			
			                    <td>{{link_to("subjects/$topic->subject_id/topics/$topic->id", 'View', $attributes = array("class"=>"btn btn-primary"))}}</td>

			                    <!-- <td>{{link_to("subjects/$topic->subject_id/topics/$topic->id/edit", 'Edit', $attributes = array("class"=>"btn btn-primary"))}}</td> -->

			                    <td>{{link_to_route('subjects.topics.edit', 'Edit',$parameters = [$topic->subject_id,$topic->id], $attributes = array("class"=>"btn btn-primary"))}}</td>

			                    <td>{{link_to("subjects/$topic->subject_id/topics/delete/$topic->id", 'Delete', $attributes = array("class"=>"btn btn-danger"))}}</td>
                			

							</tr>
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	            @else
	            	<h1>Currently There is no Topic.</h1>
	            @endif

            @else
            	<h1>please login to enter admin panel.</h1>


		@endif
	</div>


@stop