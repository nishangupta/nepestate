@extends('layouts.real-estate')

@section('content')
<div class="property-show container">
    <div class="img-gallery" id="imgGallery">
      <img src="{{asset($property->img_url)}}" alt="" class="primary-image">
      <a href="{{asset('img/property/18.jpg')}}" data-lightbox="property" alt="" title="click to see more" class="lightbox-container">
        <div class="overlay-lightbox">See more photos</div>
        <img src="{{asset($property->img_url)}}" alt="" class="secondary-image">
        <a href="{{asset('img/property/19.jpg')}}" data-lightbox="property" class="d-none"></a>
        <a href="{{asset('img/property/12.jpg')}}" data-lightbox="property" class="d-none"></a>
        <a href="{{asset('img/property/15.jpg')}}" data-lightbox="property" class="d-none"></a>
        <a href="{{asset('img/property/20.jpg')}}" data-lightbox="property" class="d-none"></a>
      </a>
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
                <div class="btn btn-info btn-sm"><i class="fas fa-bed"></i> {{$property->bed}} beds</div>
                <div class="btn btn-info btn-sm mx-2"><i class="fas fa-bath"></i> {{$property->bath}} baths</div>
                <div class="btn btn-info btn-sm"><i class="fas fa-mountain"></i> {{$property->area}} sqft</div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <h2 class="page-header text-info">${{ number_format($property->price)}}</h2>
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
      <section class="qualification-section" id="qualificationSection">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="card">
              <div class="card-header">Contact information</div>
              <div class="card-body">
                {{-- <p class="card-title p-0 my-0">Best company</p> --}}
                <p class="card-body">
                  <p>
                    Price:
                    <strong>
                      @if($property->negotiable)
                      Negotiable
                      @else
                      Fixed
                      @endif
                    </strong>
                  </p>
                  <p>
                    Full Address:
                    <strong>
                      {{$property->address}}
                    </strong>
                  </p>
                  <p class="card-text">
                    Telephone
                    <strong>
                      <i class="fas fa-phone"></i>
                      +3752912345
                    </strong>
                  </p>
                  <p class="card-text">
                    Email
                    <strong>
                      <i class="fas fa-envelope"></i>
                      contact@example.com

                    </strong>
                  </p>
                  <p class="">
                    Agent:
                    <strong>
                      agent123
                    </strong>
                  </p>
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-6">
            <div class="qualification-form">
              <form action="{{route('property.storeApplication')}}" method="POST">
                @csrf
                <input type="hidden" name="property_id" value="{{$property->id}}">
                <div class="card">
                  <div class="card-header">Request info</div>
                  <div class="card-body">
                    @if($errors->any())
                      {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Enter email"  value="{{old('email')}}">
                      <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="telephone">Telephone</label>
                      <input type="text" class="form-control" name="telephone" id="telephone" aria-describedby="telephone" placeholder="Enter telephone"  value="{{old('telephone')}}">
                      <small id="telephone" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea type="text" class="form-control" name="message" id="message" aria-describedby="message" placeholder="Message" rows="6">
                        {{old('message')}}
                      </textarea>
                    </div>
                    <button type="submit" class="primary-btn">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
      </section>

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
              <a href="{{$property->path()}}">
              <div class="similar-property">
                <div class="card shadow">
                  <img src="{{asset($miniProperty->img_url)}}" class="img-fluid mini-property-img" alt="">
                  <div class="card-body">
                    <h3 class="text-info">${{ number_format($miniProperty->price) }}</h3>
                    <div class="d-grid mt-2">
                      <div class="badge badge-secondary"><i class="fas fa-bed"></i> {{$miniProperty->bed}} beds</div>
                      <div class="badge badge-secondary"><i class="fas fa-bath"></i> {{$miniProperty->bath}} baths</div>
                      <div class="badge badge-secondary"><i class="fas fa-mountain"></i> {{$miniProperty->area}} sqft</div>
                    </div>
                    <h4 class="property-name page-header font-weight-bold pt-2">{{$miniProperty->name}}</h4>
                    <p class="property-address">{{$miniProperty->address}}</p>
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
@endsection


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
<script>
  lightbox.option({
  'resizeDuration': 200,
  'wrapAround': true
})
</script>
@endpush


@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />
<style>
  .mini-property-img{
    max-height:10rem;
    overflow-y:hidden;
  }
  .lightbox-container{
    position: relative;
  }
  .overlay-lightbox{
    position: absolute;
    top:0;
    left:0;
    bottom:0;
    width:100%;
    height:100%;
    z-index: 12;
    color:white;
    font-size:1.25rem;
    display:flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0,0,0,.45);
  }
</style>
@endpush

