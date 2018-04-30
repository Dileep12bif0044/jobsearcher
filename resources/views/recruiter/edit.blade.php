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
            <form action="{{ env('FRONT_USER').'/recruiter/edit/'.Auth::user()->id }}" method="post">
                <div class="form-group">
                    <label for="email">Phone <span class="alert-danger">*</span></label>
                    <input type="number" name="phone" placeholder="9894597840">
                </div>
                <div class="form-group">
                    <label for="name">Age <span class="alert-danger">*</span></label>
                    <input type="number" id="age" name="age" class="form-control">
                </div>
               <div class="form-group">
                    <label for="name">Designation <span class="alert-danger">*</span></label>
                    <input type="text" id="designation" name="designation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Company Name <span class="alert-danger">*</span></label>
                    <input type="text" id="company_name" name="company_name" class="form-control">
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection