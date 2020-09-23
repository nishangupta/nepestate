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
          <a href="{{route('page','user-profile')}}" title="User profile"><i class="fas fa-cogs"></i> <span class="account-nav-list-text"> Edit Profile</span></a>
        </li>
        <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'rental-resume' ? 'active-link': '' }}">
          <a href="{{route('page','rental-resume')}}" title="Rental resume"><i class="fas fa-address-card"></i> <span class="account-nav-list-text"> Rental Resume</span></a>
        </li>
        <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'property-listings' ? 'active-link': '' }}">
          <a href="{{route('user.propertyListings')}}" title="My property listings"><i class="fas fa-building"></i> <span class="account-nav-list-text"> My Property Listings</span></a>
        </li>
        <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'saved-homes' ? 'active-link': '' }}">
          <a href="{{route('page','saved-homes')}}" title="Saved homes"><i class="fas fa-search"></i><span class="account-nav-list-text"> Saved Searches</span></a>
        </li>
        <li class="list-group-item list-group-item-action">
          <a href="#" title="Notification Preferences"><i class="fas fa-envelope"></i> <span class="account-nav-list-text"> Notification Preferences</span></a>
        </li>
        <hr>
      </ul>
    </nav>
  </div>
</div>

@push('css')
<style>
@media (max-width:786px){
  .account-nav-list-text{
    display:none;
  }
}
</style>
@endpush