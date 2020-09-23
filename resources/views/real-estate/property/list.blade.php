@extends('layouts.list-layout')

@section('content')
<main>
  <div class="property-list-view">
    <div class="row">
      <div class="col-md-7 col-sm-12">
        <div class="list-view-top d-flex justify-content-between">
          <div class="w-75">
            <h5 class="list-view-hdr">
              @if($searchedProperty)
              <span class="font-weight-bold">
                {{$properties->total()}} homes available in Nep-Estate Listed below
              </span>
              @else
                No homes available with the keyword " <span class="text-info">{{request()->property}}</span> " <br>
                You can see other Available homes below
              @endif</h5>
            <hr>
            <p class="list-view-text text-info">
              Homes for Sale near '{{$properties->first()->address}}'
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
            @foreach ($properties as $property)
            <div class="col-md-6 col-sm-6">
              <div class="property-card" >
                <img src="{{asset($property->img_url)}}" alt="" class="img-fluid">
                <div class="property-card-body border">
                  <a href="{{$property->path()}}">
                    <h5 class="property-price badge badge-info">${{number_format($property->price)}}</h5>
                    <div class="d-flex my-2">
                      <div class="badge badge-secondary"><i class="fas fa-bed"></i> {{$property->bed}} beds</div>
                      <div class="badge badge-secondary mx-2"><i class="fas fa-bath"></i> {{$property->bath}} baths</div>
                      <div class="badge badge-secondary"><i class="fas fa-mountain"></i> {{$property->area}} sqft</div>
                    </div>
                    <p class="property-name">{{$property->name}}</p>
                    <p class="text-muted property-address">{{$property->address}}</p>
                  </a>
                  <a href="{{$property->path()}}" class="btn btn-block primary-btn">Check Availability</a>
                </div>
              </div>
            </div>
            @endforeach 
          </div>
        </div>
        <div class="list-view-paginator">
          <ul class="link-list">

            @if($paginator->hasPages())
              @foreach($elements as $elem => $data)
                <a href="{{$data}}" class="link-list-item {{ $elem == $paginator->currentPage() ? 'current-page': '' }}">
                  <p class="link">{{$elem}}</p>
                </a>
              @endforeach
            @else
              <li class="link-list-item">
              <a href="{{ url()->current() }}" class="">1</a>
              </li>
            @endif
            
            <li class="link-list-item">
              <a href="{{end($properties->render()->elements[0])}}"><i class="fas fa-angle-right"></i></a>
            </li>
          </ul>
          <p class="total-pagination">{{$properties->render()->paginator->total()}} Results</p>
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
      <div class="col-md-5 col-sm-12">
        <div class="google-map" id="google-map">
          <div class="mapouter">
            <div class="gmap_canvas"><iframe width="500" height="500" id="gmap_canvas"
                src="https://maps.google.com/maps?ll=27.7172453,85.3239605&q=Kathmandu&t=&z=14&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
            <style>
              .google-map{
                width:100%;
              }
              .mapouter {
                position: relative;
                text-align: right;
                height: 500px;
                width: 100%;
              }

              .gmap_canvas {
                overflow: hidden;
                background: none !important;
                height: 100%;
                width: 100%;
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