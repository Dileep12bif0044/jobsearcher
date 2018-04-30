@extends('layouts.master')
@section('title')
 	profile
@endsection
@section('content')
 	<div class="row">
	 	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
	 		<h2 class="text-center">JobSeeker Profile</h2>
 			<div class="row" id="id">
			    <div class="thumbnail thumbnail-padding">
			        <div class="caption">
				        <div>
				        	<span class="email"><label>Name:</label>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </span><br>
				        	<span class="email"><label>Email:</label>{{ Auth::user()->email }}</span><br>
				        </div>
				        @if(count($user)>0)
				        	<span title="" class="desig"><label>Designation: </label>{{ $user->designation}}</span><br>
					        <span class="email"><label>Phone:</label>{{ $user->phone}}</span><br>
					        <span class="email"><label>Age:</label>{{ $user->age}}</span>
					        <hr>
					        <span class="experience"><em></em><label>Experience:</label> {{ $user->experience}}</span><br> 
					        <span class="expected_salary"><em></em><label>Expected Salary:</label> {{ $user->expected_salary}}</span><br> 
					        <span class="curruntLocation"><label>Currunt Location:</label>{{ $user->currunt_location}}</span><br> 
					        <span class="experience"><em></em><label>Skills:</label> {{ $user->skills}}</span>
				        @endif
			        </div>
			  	</div>
			</div>
		</div>
 	</div>
@endsection