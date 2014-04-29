@extends('layouts/master')

@section('content')
	<div id="question">

		@if(Auth::check())
			@if(!$subjects->isEmpty())
	      		<div class="bs-example table-responsive">
              		<table class="table table-striped table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th>Subject Name</th>
	                    <th>View</th>
	                    <th>Edit</th>
	                    <th>Delete</th>
	                  </tr>
	                </thead>
                	<tbody>
					
                		@foreach($subjects as $subject )
							<tr>
	                			<td>{{e($subject->subject)}}</td>
	                			
			                    <td>{{link_to("subjects/$subject->id", 'View', $attributes = array("class"=>"btn btn-primary"))}}</td>

			                    <td>{{link_to("subjects/$subject->id/edit", 'Edit', $attributes = array("class"=>"btn btn-primary"))}}</td>

			                    <td>{{link_to("subjects/delete/$subject->id", 'Delete', $attributes = array("class"=>"btn btn-danger"))}}</td>
                			

							</tr>
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	            @else
	            	<h1>Currently There is no Subject.</h1>
	            @endif

            @else
            	<h1>please login to enter admin panel.</h1>


		@endif
	</div>


@stop