@extends('layouts.account-layout')

@section('content')
  <div class="account-content container-fluid">
    <div class="jumbotron">
      <h2 class="page-header">Rental Resume</h2>
      <hr>
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <h6>{{strtoupper($user->name)}}</h6>
          <p>Renter in {{$user->userInfo->location}}</p>
          <p>{{$user->email}}</p>
          <br>
          <a class="text-success cursor-pointer" role="button" href="{{route('page','user-profile')}}">Edit profile settings</a>
          <hr>
          <h6 class="text-muted">Share Settings</h6>
          <label for="SendMyRentalResume">
            <input type="checkbox" id="SendMyRentalResume" {{$user->userInfo->rental_inquiries ? 'checked':''}}> 
            Always send my rental resume
            <p class="text-muted px-3">
              When checked, the information here will be included with all future rental inquires. It will not
              be
              public
            </p>
          </label>
        </div>
        <div class="col-md-8 col-sm-12">
          <div class="form">
            <form action="">
              <div class="form-group">
                <label for="" class="">MOVE-IN-DATE</label>
                <select name="" id="" class="form-control">
                  <option value="">Unspecified</option>
                  <option value="">With in next month</option>
                  <option value="">Lets talk about it</option>
                  <option value="">Immediately</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">MOVING FROM</label>
                <input type="text" class="form-control" placeholder="Your current zip code" name="zip-code">
              </div>
              <div class="form-group">
                <label for="">TENANTS</label>
                <select name="" id="" class="form-control">
                  <option value="">Unspecified</option>
                  <option value="">1 Adults</option>
                  <option value="">2 Adults</option>
                  <option value="">3+ Adults</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">PETS</label>
                <select name="" id="" class="form-control">
                  <option value="">I don't have any pets.</option>
                  <option value="">Dog(s)</option>
                  <option value="">Cat(s)</option>
                  <option value="">other(s)</option>
                  <option value="">Unspecified</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">SMOKING</label>
                <select name="" id="" class="form-control">
                  <option value="">No,I don't smoke</option>
                  <option value="">Yes, I smoke</option>
                  <option value="">Unspecified</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Profession</label>
                <input type="text" name="profession" class="form-control">
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
    </div><!-- jumbotron -->
    @include('inc.account-footer')
  </div><!--account-content -->
@endsection


@push('js')
@endpush


@push('css')
<style>

</style>
@endpush