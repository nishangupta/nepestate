@extends('layouts.real-estate')

@section('content')
<div class="property-index">
  <div class="container-fluid">
  <section class="hero" style="background-image:url('{{asset('img/search-background.jpg')}}');">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
          <div class="hero-caption">
            <div>
              <h2 class="caption-text">Discover a place <br> You love to live.</h2>
              <br>
              <form action="{{route('property.search')}}" method="GET">
                <div class="hero-search-bx">
                    <input type="text" placeholder="Naradevi, Kathmandu" name="property" class="navbar-search-input" autofocus>
                    <button type="submit" class="hero-search-button">
                      <i class="fas fa-search"></i>
                    </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="feature-section py-5">
      <div class="container">
        <h2 class="feature-hdr page-header my-4 text-center">See how Nepestate can help</h2>
        <div class="row text-center">
          <div class="col-sm-12 col-md-4">
            <a class="feature-item card" href="#">
              <i class="fas fa-house-user fa-3x fa-primary w-auto"></i>
              <div class="card-body">
                <h3 class="card-title">Buy a home</h3>
                <p class="card-body">with over a million+ homes in sale available on the website. Nepestate can match you with a house you will want to call home.</p>
                <button class="primary-btn">Find a home</button>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md-4">
            <a class="feature-item card" href="">
              <i class="fas fa-hotel fa-3x fa-primary"></i>
              <div class="card-body">
                <h3 class="card-title">Rent a home</h3>
                <p class="card-body">with over 23+ filters and custom keyword search,Nepesate can help you easily find a rented house.</p>
                <button class="primary-btn">Find a rental</button>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md-4">
            <a class="feature-item card" href="">
              <i class="fas fa-people-carry fa-3x fa-primary"></i>
              <div class="card-body">
                <h3 class="card-title">See neighbourhoods</h3>
                <p class="card-body">with over a million+ neighbourhoods in sale available on the website. Nepestate can match you with a house you will want to call home.</p>
                <button class="primary-btn">Learn more</button>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="guides-section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="guides-item">
              <p class="guides-hdr">Nepestate Guides</p> 
              <p class="guides-text">Everything you need to know <br>
                when looking at different types of homes for sale all in <br>
                types of homes for sale all in one place.
              </p>
              <br>
              <button class="secondary-btn">See all the guides</button>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="guides-list">
              <div class="guides-item">
                <div class="guides-row">
                  <div class="guides-col"><i class="fas fa-house-user fa-3x fa-primary w-auto"></i></div>
                  <div class="guides-col">  <p class="guides-hdr">Buyers Guides</p> 
                  <a href="{{route('property.index')}}" class="secondary-link">How to buy 
                    <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="guides-item">
                <div class="guides-row">
                  <div class="guides-col">
                    <i class="fas fa-hotel fa-3x fa-primary"></i>
                  </div>
                  <div class="guides-col">  
                    <p class="guides-hdr">Renters Guides</p> 
                    <a href="{{route('property.index')}}" class="secondary-link">How to rent
                    <i class="fas fa-arrow-right"></i></a></div>
                </div>
              </div>
              <div class="guides-item">
                <div class="guides-row">
                  <div class="guides-col"><i class="fas fa-people-carry fa-3x fa-primary"></i></div>
                  <div class="guides-col">  
                    <p class="guides-hdr">Sellers Guides</p> 
                    <a href="{{route('property.index')}}" class="secondary-link">How to sell
                    <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection


@push('js')
@endpush


@push('css')
<style>

</style>
@endpush

