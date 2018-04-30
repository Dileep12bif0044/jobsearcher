@extends('layouts.master')
@section('title')
 	profile
@endsection
@section('content')
 	<div class="row">
	 	<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
	 		<h2 class="text-center">Your(Recruiter) Profile</h2>
 			<div class="row" id="id">
			    <div class="thumbnail thumbnail-padding">
			        <div class="caption">
				        <div>
				        	<span class="email"><label>Name:</label>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </span><br>
				        	<span class="email"><label>Email:</label>{{ Auth::user()->email }}</span>
				        </div>
				        @if(count($user)>0)
					        <span class="email"><label>Phone:</label>{{ $user->phone}}</span><br>
					        <span class="email"><label>Age:</label>{{ $user->age}}</span><br>
					        <hr>
				        	<bold title="" class="desig">Designation Profile: {{ $user->designation}}</bold><br>
					        <span class="company_name"><em></em><label>Company Name:</label> {{ $user->company_name}}</span><br> 
				        @endif
			        </div>
			  	</div>
			</div>
		</div>
 	</div>
@endsection