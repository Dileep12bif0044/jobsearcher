@extends('layouts.master')
@section('title')
 	Home
@endsection
@section('content')
 	<div class="row">
	 	<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
	 	@if(count($jobs)>0)
	 		<h2 class="text-center heading-text">Find A Better Job</h2>
	 		@if(Session::has('message'))
	            <p class="alert alert-success text-center">{{ Session::get('message') }}</p>
	        @endif
	 		@foreach($jobs as $job)
	 			<form action="{{ route('jobseeker.jobapply') }}" method="post">
		 			<div class="row" id="{{$job->id}}">
		 			<input type="hidden" id="job_id" name="job_id" value="{{$job->id}}">
					    <div class="thumbnail thumbnail-padding" id="hide-thumnaill">
					        <bold title="{{$job->job_title}}" class="desig"><label>Jot Title: </label> {{ucfirst($job->job_title)}}</bold>
					        <div class="caption">
					          <span class="org"><label>CompanyName:</label> {{ucfirst($job->company_name)}}</span><br>
						        <span class="exp"><em></em><label>Experience:</label> 0-1 yrs</span><br>
					        	<label>Salary:</label>
						       <span class="salary  "><em></em>{{$job->salary}}</span><br>
						        <span class="jobLocation"><label>Job Location:</label>{{ucfirst($job->location)}}</span>
						        <div class="more"> 
						        	<label>Keyskills:</label>
						            <div class="desc"> 
						            	<span itemprop="skills" class="skill">{{ucwords($job->salary)}}
						            	</span>
						            </div>
						        </div>
					        </div>
					    {{ csrf_field() }}
					    @if(Auth::check())
						    @if(Auth::user()->user_type == 2)
								<a href="{{ env('FRONT_USER').'/job/'.$job->id.'/'.$job->job_title }}" class="btn btn-primary" id="r-edit-id">show</a>
							@else
								<button type="submit" class="btn btn-success" id="apply-btn-hide">Apply</button>
								<a href="{{ env('FRONT_USER').'/job/'.$job->id.'/'.$job->job_title }}" class="btn btn-primary" id="r-edit-id">show</a>
							@endif
						@else
							<button type="submit" class="btn btn-success" id="apply-btn-hide">Apply</button>
							<a href="{{ env('FRONT_USER').'/job/'.$job->id.'/'.$job->job_title }}" class="btn btn-primary" id="r-edit-id">show</a>
						@endif
					  	</div>
					</div>
				</form>
			@endforeach
		</div>
		@else
			<h3 class="alert alert-success text-center">Curruntly jobs are not available</h3>
		@endif
 	</div>
@endsection


