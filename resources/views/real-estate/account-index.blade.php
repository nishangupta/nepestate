@extends('layouts.account-layout')

@section('content')
  <main>
    <div class="account-view">
      {{-- Account Navbar here --}}
     @include('inc.account-nav')
     
      <div class="account-content container-fluid">
        <div class="jumbotron">
          <h2 class="page-header">Edit Profile</h2>
          <hr>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="profile-changer">
                <div class="profile-pic-holder" id="profile-pic-holder">
                  <img src="{{asset('img/changeprofile.png')}}" alt="" class="img-fluid">
                </div>
                <div class="my-2 cursor-pointer">
                  <p class="text-info change-photo-bx" style="overflow-y: hidden;cursor:pointer">Change Picture
                    <input type="file" class="photo-input">
                  </p>
                </div>
                <h6>Who can see my Profile?</h6>
                <p>Your profile is private. If you have a Rental Resume, use its share setting to send it with rental
                  inquiries. No one else will see it.</p>
              </div><!-- profile changer-->
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="form">
                <form action="">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" placeholder="Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="">Your Full Name</label>
                    <input type="text" class="form-control" placeholder="name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="">User Type</label>
                    <select name="" id="" class="form-control">
                      <option value="">Home Buyer</option>
                      <option value="">Home Seller</option>
                      <option value="">Both Buyer and Seller</option>
                      <option value="">Renter</option>
                      <option value="">Rentee/Rent payer</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-2">
                        <label class="switch">
                          <input type="checkbox">
                          <span class="slider"></span>
                        </label>
                      </div>
                      <div class="col-10">
                        <label for="">Send Rental inquiries with 1-click</label><br>
                        <small class="text-muted">When checked, we'll automatically resend the same info from your
                          last
                          inquiry</small>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark mr-2">Cancel</button>
                    <button class="btn btn-danger">Save Profile</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="footer">
          <p class="footer-text">Zillow Group is committed to ensuring digital accessibility for individuals with
            disabilities. We are continuously working to improve the accessibility of our web experience for
            everyone, and we welcome feedback and accommodation requests. If you wish to report an issue or seek an
            accommodation, please <a href="#">contact us.</a></p>
          <p class="footer-text mt-4">
            Copyright © 2020 Trulia, LLC. All rights reserved. Equal Housing Opportunity. Have a Question? Visit our
            Help Center to find the answer.
          </p>
        </div>
      </div>
    </div>
  </main>
@endsection


@push('js')
@endpush


@push('css')
<style>

</style>
@endpush