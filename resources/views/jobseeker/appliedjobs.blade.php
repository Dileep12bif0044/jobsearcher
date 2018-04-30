@extends('layouts.master')
@section('title')
 	Applied Jobs
@endsection
@section('content')
 	<div class="row">
	 	<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
	 	@if(count($jobs)>0)
	 		<h2 class="text-center">Applied Jobs</h2>
	 		@foreach($jobs as $job)
	 		<a href="{{ env('FRONT_USER').'/job/'.$job->id.'/'.$job->job_title }}">
	 			<div class="row" id="{{$job->id}}">
				    <div class="thumbnail thumbnail-padding">
				        <bold title="{{$job->job_title}}" class="desig"><label>Job Title: </label>{{ucwords($job->job_title)}}</bold>
				        <div class="caption">
				          	<span class="org"><label>CompanyName:</label> {{ucfirst($job->company_name)}}</span><br>
					        <span class="exp"><em></em><label>Experience:</label> 0-1 yrs</span><br> 
					        <span class="jobLocation"><label>CompanyName:</label>{{ucfirst($job->location)}}</span>
					        <div class="more"> 
					        	<label>Salary:</label>
					            <span class="salary  "><em></em>{{$job->salary}} LPA</span>
					        </div>
					        <label>Applied at:</label>
					        <span class="date"> {{$job->updated_at}}</span>
				        </div>
				  	</div>
				</div>
			</a>
			@endforeach
		@else
			<h3 class="alert alert-success text-center">You have not applied in any job</h3>
		@endif
		</div>
 	</div>
@endsection