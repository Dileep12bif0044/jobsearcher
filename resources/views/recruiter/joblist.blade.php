@extends('layouts.master')
@section('title')
 	jobPostedList
@endsection
@section('content')
 	<div class="row">
	 	<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
	 	@if(count($jobs)>0)
	 		<h2 class="text-center">Jobs List</h2>
	 		@if(Session::has('message'))
                <p class="alert alert-success text-center">{{ Session::get('message') }}</p>
            @endif
	 		@foreach($jobs as $job)
			<div class="thumbnail">
	 			<div class="row thumbnail-padding" id="{{$job->id}}">
			        <bold title="{{$job->job_title}}" class="desig"><label>Job Title:</label> {{ucwords($job->job_title)}}</bold>
			        <div class="caption">
			          	<span class="org"><label>CompanyName:</label> {{ucfirst($job->company_name)}}</span><br>
				        <span class="exp"><em></em><label>Experience:</label> {{$job->experience}}</span><br> 
				        <span class="jobLocation"><label>CompanyName:</label>{{$job->location}}</span>
				        <div class="more"> 
				        	<label>Salary:</label>
				            <span class="salary  "><em></em>{{$job->salary}} LPA</span>
				        </div>
			        </div>
			  	</div>
				<a href="{{ env('FRONT_USER').'/job/'.$job->id.'/'.$job->job_title }}" class="btn btn-primary" id="r-edit-id">show</a>
				<a href="{{ env('FRONT_USER').'/recruiter'.'/jobseekers-applied/'.$job->id.'/'.$job->job_title }}" class="btn btn-primary" id="r-edit-id">checKcandidate</a>
				<a href="{{ env('FRONT_USER').'/recruiter'.'/delete/'.$job->id.'/'.$job->job_title }}" class="btn btn-danger" id="r-edit-id">Delete</a>
			</div>
			@endforeach
		@else
			<h3 class="alert alert-success text-center">Zero posted jobs are active</h3>
		@endif
		</div>
 	</div>
@endsection