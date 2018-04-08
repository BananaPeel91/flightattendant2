<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand " href="#" style="color:#acefec;">Flight Attendant</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/jobs">Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/operators">Operators</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="/attendants">Flight Attendants</a>
      </li>
     
      
    </ul>
     <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li style="margin-left:10px;"><a style="color:white;" href="{{ route('login') }} ">Login</a></li>
                            <li style="margin-left:10px;"><a style="color:white;" href="{{ route('register') }} ">Register</a></li>
                        @else
                            

                            <li style="margin-left:10px;"><a style="color:white;" href="/users/{{ Auth::user()->id}}"><button class="btn btn-primary">My Profile</button></a></li>
                            
                            <li style="margin-left:10px;" class="nav-item">    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}

                                            <button class="btn btn-primary" type="submit">Logout</button>
                                        </form>            
                               </li>
                                 @endif
                    </ul>
            </div>
</nav>                          

                                        
                                    
                                
                                
                            
                      
   
