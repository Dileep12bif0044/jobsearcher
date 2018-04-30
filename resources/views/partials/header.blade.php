<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">JobSearcher</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right normal-text">
        <li class="dropdown">
        @if(Auth::check())
          @if(Auth::user()->user_type == 1)
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ ucfirst(Auth::user()->first_name) }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('jobseeker.profile') }}">View Profile</a></li>
              <li><a href="{{ route('jobseeker.edit') }}">Edit Profile</a></li>
            </ul>
            <li><a href="{{ route('jobseeker.appliedJobs') }}">Applied Jobs</a></li>
            <li><a href="{{ route('jobseeker.profile') }}">JobSeeker Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('jobseeker.logout') }}">Logout</a></li>
          @elseif(Auth::user()->user_type == 2)
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ ucfirst(Auth::user()->first_name) }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('recruiter.profile') }}">View Profile</a></li>
              <li><a href="{{ route('recruiter.edit') }}">Edit Profile</a></li>
            </ul> 
            <li><a href="{{ route('recruiter.jobpost') }}">JobPost</a></li>
            <li><a href="{{ route('recruiter.jobpostslist') }}">PostedJobList</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('recruiter.logout') }}">Logout</a></li>
          @endif
        @else
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signup <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('jobseeker.create') }}">Job Seeker</a></li>
            <li><a href="{{ route('recruiter.create') }}">Recruiter</a></li>
          </ul>
        </li>
        <li><a href="{{ route('user.signin') }}">Login</a></li>
        @endif
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>