<div class="account-navigation">
  <div class="container-fluid">
    <nav class="account-nav" id="account-nav">
      <div class="profile-nav">
        <i class="fas fa-user fa-2x pt-2"></i>
        <h6 class="account-holder">{{$user->name}}</h6>
      <p class="account-type">{{$userType->user_type}}</p>
      </div>
      <hr>
      <ul class="account-nav-list list-group list-group-flush">
        <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'user-profile' ? 'active-link': '' }}">
          <a href="{{route('page','user-profile')}}"><i class="fas fa-cogs"></i> Edit Profile</a>
        </li>
        <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'rental-resume' ? 'active-link': '' }}">
          <a href="{{route('page','rental-resume')}}"><i class="fas fa-address-card"></i> Rental Resume</a>
        </li>
        <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'saved-searches' ? 'active-link': '' }}">
          <a href="{{route('page','saved-homes')}}"><i class="fas fa-search"></i> Saved Searches</a>
        </li>
        <li class="list-group-item list-group-item-action">
          <a href="#"><i class="fas fa-building"></i> My Rooms for Rent</a>
        </li>
        <li class="list-group-item list-group-item-action">
          <a href="#"><i class="fas fa-envelope"></i> Notification Preferences</a>
        </li>
        <hr>
      </ul>
    </nav>
  </div>
</div>