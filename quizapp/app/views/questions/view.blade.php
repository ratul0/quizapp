@extends('layouts/master')

@section('content')
	<div id="question">

		@if(Auth::check())
			@if(!empty($questions))
				@foreach($topics as $topicKey=>$topic )
					<div class="page-header">
		              <h3 id="tables">{{$topic}}</h3>
		            </div>
	      		<div class="bs-example table-responsive">
              		<table class="table table-striped table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th>Question</th>
	                    <th>Difficulty</th>
	                    <th>View</th>
	                    <th>Edit</th>
	                    <th>Delete</th>
	                  </tr>
	                </thead>
                	<tbody>
					
                		@foreach($questions as $question )
                			@if($question->topic_id == $topicKey)
								<tr>
		                			<td>{{HTML::entities($question->question)}}</td>

		                			<td>{{e($difficulty[$question->difficulty])}}</td>
		                			
				                    <td>{{link_to_route('subjects.topics.questions.show', 'View',$parameters = [$subject[$question->topic_id],$question->topic_id,$question->id], $attributes = array("class"=>"btn btn-primary"))}}</td>

				                    <td>{{link_to_route('subjects.topics.questions.edit', 'Edit',$parameters = [$subject[$question->topic_id],$question->topic_id,$question->id], $attributes = array("class"=>"btn btn-primary"))}}</td>
									<?php $temp = $subject[$question->topic_id];  ?>
				                    <td>{{link_to("subjects/$temp/topics/$question->topic_id/questions/delete/$question->id", 'Delete', $attributes = array("class"=>"btn btn-danger"))}}</td>
	                			

								</tr>
							@endif
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	            @endforeach
	            @else
	            	<h1>Currently There is no Questions.</h1>
	            @endif

            @else
            	<h1>please login to enter admin panel.</h1>


		@endif
	</div>


@stop