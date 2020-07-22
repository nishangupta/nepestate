@extends('layouts.app')

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
              <p class="lead">Austin,Tx 8123123</p>
              <div class="d-flex mt-2">
                <div class="badge badge-info"><i class="fas fa-bed"></i> 3 beds</div>
                <div class="badge badge-info mx-2"><i class="fas fa-bath"></i> 2 baths</div>
                <div class="badge badge-info"><i class="fas fa-mountain"></i> 3021 sqft</div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <h2 class="page-header">$879,1200</h2>
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
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum eveniet earum natus iste
              necessitatibus nisi laudantium, dolorum, inventore dicta corporis cum cupiditate. Vero debitis, sunt
              iusto
              sequi accusantium ipsa! Impedit ratione quaerat incidunt odio, esse sed suscipit? Tempora corporis rem
              repellendus deserunt veritatis autem rerum. Earum eligendi nemo rerum ea.</p>
          </div>
          <hr>
          <div class="property-details my-3">
            <h5 class="text-bold">Home Details for 4402 Belive vei</h5>
            <div class="row">
              <div class="col">
                <ul>
                  <li>Single family home</li>
                  <li>Single family home</li>
                  <li>Single family home</li>
                  <li>Single family home</li>
                  <li>Single family home</li>
                </ul>
              </div>
              <div class="col">
                <ul>
                  <li>Single family home</li>
                  <li>Single family home</li>
                  <li>Single family home</li>
                  <li>Single family home</li>
                  <li>Single family home</li>
                </ul>
              </div>
            </div>
          </div>
          <button class="btn btn-outline-info">See All</button>
          <br>
          <hr>
          <div class="similar-properties-container">
            <h3>Similar Homes You May Like</h3>
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="card similar-property">
                  <img src="{{asset('img/realestate2.jpg')}}" class="img-fluid" alt="">
                  <div class="card-body">
                    <h3 class="page-header">$123,1231</h3>
                    <div class="d-grid mt-2">
                      <div class="badge badge-secondary"><i class="fas fa-bed"></i> 3 beds</div>
                      <div class="badge badge-secondary"><i class="fas fa-bath"></i> 2 baths</div>
                      <div class="badge badge-secondary"><i class="fas fa-mountain"></i> 3021 sqft</div>
                    </div>
                    <h4 class="property-name page-header font-weight-bold pt-2">4402 Bellive ave</h4>
                    <p class="">Austin,Tx 8123123</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="card similar-property">
                  <img src="{{asset('img/realestate2.jpg')}}" class="img-fluid" alt="">
                  <div class="card-body">
                    <h3 class="page-header">$123,1231</h3>
                    <div class="d-grid mt-2">
                      <div class="badge badge-secondary"><i class="fas fa-bed"></i> 3 beds</div>
                      <div class="badge badge-secondary"><i class="fas fa-bath"></i> 2 baths</div>
                      <div class="badge badge-secondary"><i class="fas fa-mountain"></i> 3021 sqft</div>
                    </div>
                    <h4 class="property-name page-header font-weight-bold pt-2">4402 Bellive ave</h4>
                    <p class="">Austin,Tx 8123123</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="card similar-property">
                  <img src="{{asset('img/realestate4.jpg')}}" class="img-fluid" alt="">
                  <div class="card-body">
                    <h3 class="page-header">$451,1231</h3>
                    <div class="d-grid mt-2">
                      <div class="badge badge-secondary"><i class="fas fa-bed"></i> 3 beds</div>
                      <div class="badge badge-secondary"><i class="fas fa-bath"></i> 2 baths</div>
                      <div class="badge badge-secondary"><i class="fas fa-mountain"></i> 3021 sqft</div>
                    </div>
                    <h4 class="property-name page-header font-weight-bold pt-2">4402 Bellive ave</h4>
                    <p class="">Malhone,Tx 8123123</p>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div> <!-- property-desc-grid row end-->
      </div>
    </div>
  </div>
</div>
@endsection


@push('js')
@endpush


@push('css')
<style>
h1,
h2,
h3,
h4,
h5,
h6 {
  padding: 0;
}
p {
  padding: 0;
  margin: 0;
}

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
  padding: 0 5rem;
}
.img-gallery {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr; 
  grid-gap:.2rem;
  margin: 2rem;
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
  padding: 0 2rem;
}

.property-details ul li {
    padding: 0.5rem 0;
  }
}
.similar-property:hover {
  box-shadow:0 0 0 20px 40px rgba(0,0,0,.2);
}

</style>
@endpush

