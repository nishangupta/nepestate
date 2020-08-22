<nav class="navbar navbar-expand-md navbar-light bg-light shadow" id="navbar">
  <a href="{{route('property.index')}}" class="navbar-brand">
    <!-- <img src="logo2.png" alt="">-->NepEstate</a>
  <div class="navbar-search-bx">
    <form action="{{route('property.search')}}" method="GET">
      <input type="text" placeholder="Parker,Co" name="property" class="navbar-search-input">
      <button type="submit" class="primary-btn"><i class="fas fa-search"></i></button>
    </form>
  </div>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item"><a href="{{route('property.buy')}}" class="nav-link">Buy</a></li>
    <li class="nav-item"><a href="{{route('property.rent')}}" class="nav-link">Rent</a></li>
    <li class="nav-item"><a href="{{route('property.mortage')}}" class="nav-link">Mortage</a></li>
  </ul>
  <ul class="navbar-nav mx-auto">
    <li class="nav-item"><a href="{{route('page','saved-homes')}}" class="nav-link">Saved Homes</a></li>
    <li class="nav-item"><a href="{{route('page','rental-resume')}}" class="nav-link">Rental Resume</a></li>
  </ul>
  <ul class="navbar-nav ml-auto">
    @auth
    <li class="nav-item dropdown">
      <a href="{{route('user.login')}}" class="primary-btn dropdown-toggle" data-toggle="dropdown">Logged in as {{auth()->user()->name}}</a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
        <a class="dropdown-item" href="{{route('page','user-profile')}}">
          <span class="dropdown-link" >User account</span>
        </a>
        <a class="dropdown-item" href="{{route('user.logout')}}">
          <span class="dropdown-link" >Logout</span>
        </a>
      </div>
    </li>
    @endauth
    @guest
    <a href="{{route('user.login')}}" class="primary-btn">Sign up or Log in</a>
    @endguest
  </ul>
  <div class="mb-nav">
    <a href="#" class="nav-link mb-nav-toggler"><i class="fas fa-bars"></i></a>
    <div class="mb-nav-list">
      <a href="#" class="mb-nav-toggler ml-auto btn btn-danger text-light">Close</a>
      <a href="{{route('user.login')}}" class="mb-nav-link">Sign up or log in</a>
      <a href="{{route('property.buy')}}" class="mb-nav-link">Buy <i class="fas fa-angle-down"></i></a>
      <a href="{{route('property.rent')}}" class="mb-nav-link">Rent <i class="fas fa-angle-down"></i></a>
      <a href="{{route('property.mortage')}}" class="mb-nav-link">Mortage <i class="fas fa-angle-down"></i></a>
    </div>
  </div>
</nav>