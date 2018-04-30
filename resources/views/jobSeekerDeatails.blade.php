@extends('layouts.master')
@section('title')
 	profile
@endsection
@section('content')
 	<div class="row">
	 	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
	 		<h2 class="text-center">JobSeeker Details</h2>
 			<div class="row" id="id">
 				@if(count($user)>0)
			    <div class="thumbnail thumbnail-padding">
			        <div class="caption">
				        <div>
				        	<span class="email"><label>Name:</label>{{ $user->first_name }} {{ $user->last_name }} </span><br>
				        	<span class="email"><label>Email:</label>{{ $user->email }}</span>
				        </div>
				        <span class="email"><label>Phone:</label>{{ $user->phone}}</span><br>
				        <span class="email"><label>Age:</label>{{ $user->age}}</span><br>
				        <hr>
			        	<bold title="" class="desig"><label>Designation Profile:</label> {{ $user->designation}}</bold><br>
				        <span class="company_name"><em></em><label>Expected Salary: </label>{{ $user->expected_salary}}</span><br>
				        <span><label>Eperience:</label> {{ $user->experience}}</span><br> 
				        <span><label>Skills:</label> {{ $user->skills}}</span><br> 
			        </div>
			  	</div>
			  	@endif
			</div>
		</div>
 	</div>
@endsection