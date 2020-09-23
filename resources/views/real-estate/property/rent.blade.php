@extends('layouts.list-layout')

@section('content')
<main>
  <div class="property-list-view">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="list-view-top d-flex justify-content-between">
          <div class="w-75">
            <h5 class="list-view-hdr">
              Homes for Rent
            </h5>
            <hr>
            <p class="list-view-text text-info">
            </p>
          </div>
          <div class="form-group">
            <form action="{{ route('property.priceChanger') }}" method="POST">
              <select name="list-type" class="form-control" onchange="this.form.submit()" >
                <option value="0">Just for you</option>
                <option value="1">Price low to high</option>
                <option value="2">Price high to low</option>
              </select>
              <input type="hidden" name="keyword" value="{{request()->property}}">
              @csrf
            </form>
          </div>
        </div>
        <div class="property-list">
          <div class="row">
            <div class="container text-center">
              <h3 class="">Unfortunately, there are no available homes for rental OR. <br>
                Try searching for a different location or neighborhood.</h3>
                <img src="{{asset('img/NoResult.svg')}}" alt="">
            </div>
          </div> 
        </div>
        <div class="list-view-paginator">
          <ul class="link-list">
              <li class="link-list-item">
              <a href="{{ url()->current() }}" class="">1</a>
              </li>
            <li class="link-list-item">
              <a href="#"><i class="fas fa-angle-right"></i></a>
            </li>
          </ul>
        </div>
        <div class="list-footer">
          <p class="list-footer-text">Zillow Group is committed to ensuring digital accessibility for individuals with
            disabilities. We are continuously working to improve the accessibility of our web experience for
            everyone, and we welcome feedback and accommodation requests. If you wish to report an issue or seek an
            accommodation, please <a href="#">contact us.</a></p>
          <p class="list-footer-text mt-4">
            Copyright © 2020 Trulia, LLC. All rights reserved. Equal Housing Opportunity. Have a Question? Visit our
            Help Center to find the answer.
          </p>
        </div>
      </div><!-- property list -->
      <div class="col-md-6 col-sm-12">
        <div class="google-map" id="google-map">
          <div class="mapouter">
            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                src="https://maps.google.com/maps?ll=27.7172453,85.3239605&q=Kathmandu&t=&z=14&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
            <style>
              .mapouter {
                position: relative;
                text-align: right;
                height: 500px;
                width: 100%;
              }

              .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 500px;
                width: 600px;
              }
            </style>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection

@push('css')
<style>
 
</style>
@endpush

@push('js')
<script>
</script>
@endpush