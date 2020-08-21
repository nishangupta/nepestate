@extends('layouts.real-estate')

@section('content')
<div class="property-show container">
  <div class="app" id="app">
    <div class="img-gallery">
      <img src="{{asset('img/realestate1.jpeg')}}" alt="" class="primary-image">
      <img src="{{asset('img/realestate1.jpeg')}}" alt="" class="secondary-image">
      <img src="{{asset('img/realestate1.jpeg')}}" alt="" class="secondary-image2">
      <div class="save-share-btn">
        <button type="button" class="btn shadow"><i class="fas fa-heart"></i> Save</button>
        <button type="button" class="btn shadow"><i class="fas fa-cloud"></i> Share</button>
      </div>
    </div>
    <div class="property-desc-grid">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <h2 class="property-name page-header">{{$property->name}}</h2>
              <p class="lead">{{$property->address}}</p>
              <div class="d-flex mt-2">
                <div class="badge badge-info"><i class="fas fa-bed"></i> {{$property->bed}} beds</div>
                <div class="badge badge-info mx-2"><i class="fas fa-bath"></i> {{$property->bath}} baths</div>
                <div class="badge badge-info"><i class="fas fa-mountain"></i> {{$property->area}} sqft</div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <h2 class="page-header text-info">${{ number_format($property->price,0,'.',',')}}</h2>
              <p>Est.Mortgage $4,706/mo</p>
              <div class="d-flex my-2 btn-group">
                <button class="btn btn-sm btn-info">Get Pre-Qualified</button>
                <button class="btn btn-sm btn-outline-info"><i class="fas fa-map"></i> Map location</button>
              </div>
            </div>
          </div>
          <hr>
          <div class="descripion my-3">
            <h5 class="text-bold">Description</h5>
            <p class="lead">{{$property->description}}</p>
          </div>
          <hr>
          <div class="property-details my-3">
            <h5 class="text-bold">Home Details for {{$property->name}}</h5>
            <div class="row">
              <div class="col">
                <ul class="">
                  <li>This area far as my views is not for kids. It’s pretty much no where for them to really play safely especially if they are riding bikes. This is more of a college area and young adults who are lookin to hang out pretty much.</li>
                  <li>I love it here. Less children the better. A playground for singles and young couples with NO children. Great place to be able to entertain at your home with out fear of neighbors complaining</li>
                  <li>It’s not safe for small children, it’s mostly for young adults. It’s noisy and there’s not much room for them to play, I suggest some of the suburbs like Kennesaw or lithia springs maybe</li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li>Lots of trees and green space. Children friendly as lots of fields and grassy areas for them to play.</li>
                  <li>asdfasdasdamily asdfamily home</li>
                  <li>Two hours each day and I just want a good area to stay and get to work on time . So I hope this is a good area to stay</li>
                  <li>Not for families. It’s great for single or couples. But not a good environment for kids or raising a family</li>
                </ul>
              </div>
            </div>
          </div>
          <button class="btn btn-outline-info">See All</button>
          <br>
        </div> <!-- property-desc-grid row end-->
      </div>
      <hr>
      <section class="review-section">
        <div class="container">
          <div class="review-section-hdr my-2">
            <h2 class="page-header">What locals say</h2>
            <p class="text-muted pb-3">At least 131 Nepestate users voted on this feature. </p>
          </div>
          <div class="review-bdy">
            <div class="row">
              <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="review-block">
                  <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-thumbs-up"></i>
                    78%
                  </button>
                  <div class="review-text">
                    <i class="fas fa-paw"></i>
                    It's dog friendly.
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="review-block">
                  <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-thumbs-up"></i>
                    78%
                  </button>
                  <div class="review-text">
                    <i class="fas fa-walking"></i>
                    There's a side walk.
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="review-block">
                  <button type="button" class="btn btn-outline-info ">
                    <i class="fas fa-thumbs-up"></i>
                    78%
                  </button>
                  <div class="review-text">
                    <i class="fas fa-bolt"></i>
                    Street are well light.
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="review-block">
                  <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-thumbs-up"></i>
                    78%
                  </button>
                  <div class="review-text">
                    <i class="fas fa-utensils"></i>
                    Resturants available here.
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="review-block">
                  <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-thumbs-up"></i>
                    78%
                  </button>
                  <div class="review-text">
                    <i class="fas fa-glass-cheers"></i>
                    Holiday enjoyable.
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 col-sm-3">
                <div class="review-block">
                  <button type="button" class="btn btn-outline-info">
                    <i class="fas fa-thumbs-up"></i>
                    78%
                  </button>
                  <div class="review-text">
                    <i class="fas fa-assistive-listening-systems "></i>
                    It's quiet.
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <p class="text-small text-muted">Learn more about our methodology.</p>
        </div>
      </section>

      <section class="jumbotron py-4">
        <div class="similar-properties-container">
          <h3>Similar Homes You May Like</h3>
          <hr>
          <div class="row">
            @foreach($property->userCanLike as $miniProperty)
            <div class="col-lg-3 col-md-6 col-sm-6 my-2">
              <a href="{{route('property.show',['property'=>$miniProperty])}}">
              <div class="similar-property">
                <div class="card ">
                  <img src="{{asset('img/realestate2.jpg')}}" class="img-fluid" alt="">
                  <div class="card-body">
                    <h3 class="text-info">${{ number_format($miniProperty->price,0,'.',',') }}</h3>
                    <div class="d-grid mt-2">
                      <div class="badge badge-secondary"><i class="fas fa-bed"></i> {{$miniProperty->bed}} beds</div>
                      <div class="badge badge-secondary"><i class="fas fa-bath"></i> {{$miniProperty->bath}} baths</div>
                      <div class="badge badge-secondary"><i class="fas fa-mountain"></i> {{$miniProperty->area}} sqft</div>
                    </div>
                    <h4 class="property-name page-header font-weight-bold pt-2">{{$miniProperty->name}}</h4>
                    <p class="property-address">{{$property->address}}</p>
                  </div>
                </div>
              </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    </div><!--Property desc Grid-->
  </div>
</div>
@endsection


@push('js')

@endpush


@push('css')
<style>
.save-share-btn {
  position: absolute;
  display: flex;
  top: 0.5rem;
  left: 50%;
  display: none;
  animation: slide-down 0.2s ease;
}
@keyframes slide-down {
  0% {
    opacity: 0;
    top: -50px;
    scale: 0.2;
  }
  100% {
    opacity: 1;
    scale: 1;
  }
}
.save-share-btn button {
  background-color: #fff;
  color: #007882;
  padding: auto;
  border: 1px solid #ccc;
  font-weight: bold;
}
.save-share-btn button:hover {
  background-color: #e8e9ea;
  color: #007882;
}
.app {
  padding: 0rem;
}
.img-gallery {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr; 
  grid-gap:.2rem;
  margin: 2rem 0;
  position: relative;
}
.img-gallery img {
  width: 100%;
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  border-radius: 10px;
}
.primary-image {
  grid-column: 1/3;
  grid-row: 1/3; 
}
.secondary-image {
  grid-row:1/2;
  grid-column: 3/4;
}
.secondary-image2 {
  grid-row:2/3;
  grid-column: 3/4;
}
.img-gallery:hover .save-share-btn {
  display: block;
}
.img-gallery:hover img {
  animation: scale-up 0.4s forwards;
}
.property-name{
  color:#01ADBB;
}
.property-address{
  color:#007882;
}
@keyframes scale-up {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(1.02);
  }
}

@media only screen and (max-width: 780px) {
  .img-gallery {
    max-height: auto;
    padding: 0;
  }
  .primary-image {
    grid-column: 1/-1;
    grid-row: 1/-1;
  }
  .secondary-image {
    display: none;
  }
}

/* Property desc */
.property-desc-grid {
  padding: 0rem;
}

.property-details ul li {
    padding: 0.5rem 0;
  }
}

.similar-property {
  cursor: pointer;
  box-shadow:0 0 0 20px 40px rgba(0,0,0,.2);
}
/* review section */
.review-section{
  background:linear-gradient(to bottom right,#ffffff,#f6f4f3);
  padding:2rem auto;
  margin:2rem 0;
}
.review-block{
  display:flex;
  align-items: center;
  margin-bottom:1rem;
}
.review-block:hover{
  cursor:pointer;
  background:linear-gradient(to right,#e8e9ea,#b3edf1);
}
.review-text{
  padding-left:2rem;
}
</style>
@endpush

