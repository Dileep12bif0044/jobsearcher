@extends('layouts.master')
@section('title')
    jobPost
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
            <h1>Recruiter Post A Job</h1>
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
            <form action="{{ route('recruiter.jobstore') }}" method="post">
                <div class="form-group">
                    <label for="name">Job Title <span class="alert-danger">*</span></label>
                    <input type="text" id="job-title" name="job_title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Job description <span class="alert-danger">*</span></label>
                    <textarea name="job_description" rows="7" cols="67"></textarea>
                </div>
               <div class="form-group">
                    <label for="name">Required Skills <span class="alert-danger">*</span></label>
                    <input type="text" id="skills" name="skills" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Company Name <span class="alert-danger">*</span></label>
                    <input type="text" id="company-name" name="company_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Salary (INR)<span class="alert-danger">*</span></label>
                    <input type="text" id="salary" name="salary" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Address </span></label>
                    <input type="text" id="address" name="address" class="form-control">
                </div>   
                <div class="form-group">
                    <label for="name">Job location <span class="alert-danger">*</span></label>
                    <input type="text" id="location" name="location" class="form-control">
                </div>           
                <div class="form-group">
                    <label for="name">Country <span class="alert-danger">*</span></label>
                    <input type="text" id="country" name="country" class="form-control">
                </div>      
                <button type="submit" class="btn btn-primary">Post</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection