



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    {{-- <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;"> --}}
      {{-- <div class="container"> --}}
      {{-- <a class="navbar-brand mr-auto" href="#">PositronX</a> --}}
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" --}}
      {{-- aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> --}}
      {{-- <span class="navbar-toggler-icon"></span> --}}
      {{-- </button> --}}
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      {{-- @guest
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">SignIn</a>
        </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('register-user') }}">SignUp</a>
      </li>
      
      <li class="nav-item">
      <a class="nav-link" href="{{ route('signout') }}">SignOut</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        @else --}}



        @if(Auth::check() && Auth::user()->agent == '1')
        <li class="nav-item">
          <a class="nav-link" href="agents/create">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">Home</a>
            </li>
             
          <li class="nav-item">
            <a class="nav-link" href="{{ route('signout') }}">SignOut</a>
            </li>

            {{-- <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">SignIn</a>
              </li> --}}
              
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">SignIn</a>
            </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ route('register-user') }}">SignUp</a>
          </li>
          
          <li class="nav-item">
          <a class="nav-link" href="{{ route('signout') }}">SignOut</a>
          </li>
       
        @endif





        {{-- <li class="nav-item">
          <a class="nav-link" href="agents/create">Post</a>
          </li>
      @endguest --}}
      </ul>
      </div>
      {{-- </div> --}}
      {{-- </nav> --}}
    <form class="d-flex input-group w-auto">
      <input
        type="search"
        class="form-control rounded"
        placeholder="Search"
        aria-label="Search"
        aria-describedby="search-addon"
      />
      <span class="input-group-text border-0" id="search-addon">
      <i class="bi bi-search"></i>
      </span>
    </form>
  </div>
</nav>
