@extends('layouts.master')
@section('title')
 	applied Candidates
@endsection
@section('content')
 	<div class="row">
	 	@if(count($appliedCands)>0)
	 	<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
	 		<h2 class="text-center">Applied JobSeekers</h2>
	 		@foreach($appliedCands as $appliedCand)
			<div class="thumbnail">
	 			<div class="row thumbnail-padding" id="{{$appliedCand->id}}">
			        <div class="caption">
						<label>Name: </label>
			          	<a title="Job Posted by {{ucfirst($appliedCand->first_name)}} " href="{{ env('FRONT_USER').'/logged-in-user/'.$appliedCand->user_id }}">{{ucfirst($appliedCand->first_name)}} {{$appliedCand->last_name}} 
			            </a> <br>
				        <span class="exp"><em></em><label>Experience:</label> {{$appliedCand->experience}}</span><br> 
				        <span class="jobLocation"><label>Currunt Location:</label>{{$appliedCand->currunt_location}}</span>
				        <div class="more"> 
				        	<label>Expected Salary:</label>
				            <span class="salary  "><em></em> {{$appliedCand->expected_salary}}</span>
				        </div>
			        </div>
			  	</div>
			</div>
			@endforeach
		</div>
		@else
		<h2 class="text-center">No one has applied</h2>
		@endif
 	</div>
@endsection