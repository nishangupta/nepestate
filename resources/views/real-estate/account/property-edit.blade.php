@extends('layouts.account-layout')
@section('content')
{{-- side-bar code in account-layout blade file --}}
<div class="account-content container-fluid">
  <div class="jumbotron">
    <h2 class="page-header">Update existing property listing</h2>
    <hr>
    <a href="{{route('user.propertyListings')}}" type="button" class="btn primary-btn"><i class="fas fa-chevron-left"></i> My property listings</a>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="my-4">
          <div class="listings-contaner">
            <div class="listings-hdr mb-4">
              <h3 class="">Listing Information </h3>
            </div>
            <div class="listings-bdy">
              <form action="{{route('user.propertyUpdate',['property'=>$property])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-lg-6 col-sm-10">
                    <div class="form-group">
                      <label for="">Name of the house *</label>
                      <input type="text" class="form-control @error('name') input-error @enderror" placeholder="Ex:Mr.Corney house" name="name" value="{{$property->name??old('name')}}">
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-10">
                    <div class="form-group">
                      <label for="">Address *</label>
                      <input type="text" class="form-control @error('addess') input-error @enderror" placeholder="Address" name="address" value="{{$property->address??old('address')}}">
                      @error('address')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-10">
                    <div class="form-group">
                      <label for="">Price estimated *</label>
                      <input type="text" class="form-control @error('price') input-error @enderror " placeholder="$" name="price" value="{{$property->price??old('price')}}">
                      @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-sm-10">
                    <div class="form-group">
                      <label for="">Bed rooms *</label>
                      <input type="number" class="form-control @error('bed') input-error @enderror" placeholder="" min="1" name="bed" value="{{$property->bed??old('bed')}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-10">
                    <div class="form-group">
                      <label for="">Bathrooms *</label>
                      <input type="number" class="form-control @error('bath') input-error @enderror" placeholder="" min="1" name="bath" value="{{$property->bath??old('bath')}}">
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-10">
                    <div class="form-group">
                      <label for="">Square feet *</label>
                      <input type="number" class="form-control @error('area') input-error @enderror" min="1" placeholder="sq.ft" name="area" value="{{$property->area??old('area')}}">
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-4 col-sm-10">
                    <div class="form-group">
                      <label for="">Date available </label>
                      <input type="date" class="form-control" placeholder="" name="date" value="{{$property->date??old('date')}}">
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-8 col-sm-10">
                    <div class="form-group">
                      <h3 for="">Detailed description </h3>
                      <p class="text-lead">About the property</p>
                      <br><textarea style="height:140px" type="text" name="description" value="" class="form-control @error('description') input-error @enderror" placeholder="Renters will read this first, so highlight any upgrades and desirable features. This article has more tips on what to include.">{{ $property->description??old('description') }}</textarea>
                      @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row my-4">
                  <div class="col-lg-8 col-sm-10">
                    <div class="form-group">
                      <h3 class="">Property media</h3>
                      <div class="media-box py-2">
                        <img src="{{asset($property->img_url) ?? ''}}" alt="Property Image">
                      </div>
                      <label for="">Choose photos for this Listings</label> <br>
                      <input type="file" name="img">
                      @error('img')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-10">
                    <h2>Your contact information</h2>
                    <p class="mb-2 text-muted">Your user information will be uploaded.</p>
                    <div class="form-group">
                      <label for="">Agent Name *</label>
                      <input type="text" class="form-control @error('agent') input-error @enderror" placeholder="" name="agent" value="{{$property->agent??old('agent')}}">
                      @error('agent')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="d-flex align-items-center mb-4">
                      <button type="submit" class="btn btn-info">Publish Listing</button>
                      <p class="mx-4 text-muted"> This listing is free!</p>
                    </div>
                  </div>
                </div>
                <p class="text-muted">By clicking Publish listing, you agree to comply with our Terms of Use, <a href="#">Rental User Terms</a>, and <a href="#">Respectful Renting Pledge.</a></p>
                <hr>
              </form>
            </div>
          </div>
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
.jumbotron{
  min-height: 80vh;
}
.input-error{
  border-color:#f1c0c4;
}
.media-box{
  width:15rem;
  height:auto;
}
.media-box img{
  width:15rem;
  height:auto;
}</style>
@endpush