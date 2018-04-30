@extends('layouts.master')
@section('title')
    jobPost
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
            <h1>User Update Profile</h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if(Session::has('message'))
                <p class="alert alert-success text-center">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ env('FRONT_USER').'/jobseeker/edit/'.Auth::user()->id }}" method="post">
                <div class="form-group">
                    <label for="email">Phone <span class="alert-danger">*</span></label>
                    <input type="number" name="phone">
                </div>
                <div class="form-group">
                    <label for="name">Age <span class="alert-danger">*</span></label>
                    <input type="number" id="age" name="age" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Experience <span class="alert-danger">*</span></label>
                    <input type="text" id="experience" name="experience" class="form-control">
                </div>
               <div class="form-group">
                    <label for="name">Skills <span class="alert-danger">*</span></label>
                    <input type="text" id="skills" name="skills" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Designation looking for <span class="alert-danger">*</span></label>
                    <input type="text" id="designatiion" name="designation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Expected Salary (INR)<span class="alert-danger">*</span></label>
                    <input type="text" id="expected_salary" name="expected_salary" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Currunt location <span class="alert-danger">*</span></label>
                    <input type="text" id="currunt_location" name="currunt_location" class="form-control">
                </div>           
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection