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
    <li class="nav-item"><a href="{{route('user.savedHomes')}}" class="nav-link">Saved Homes</a></li>
    <li class="nav-item"><a href="{{route('user.rentalResume')}}" class="nav-link">Rental Resune</a></li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <a href="{{route('user.login')}}" class="primary-btn">Sign up or Log in</a>
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
