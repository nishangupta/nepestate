@extends('layouts.account-layout')

@section('content')
  <main>
    <div class="account-view">
      {{-- Account Navbar here --}}
     @include('inc.account-nav')
     
      <div class="account-content container-fluid">
        <div class="jumbotron">
          <h2 class="page-header">Saved Homes</h2>
          <hr>
          <div class="row">
            <div class="col-lg-5 col-sm-6 mx-auto">
              <div class="text-center">
                <p class="lead">You haven't added any homes yet.</p>
                <p class="lead">Start Searching for property to add now.</p>
                <br>
                <button class="btn danger-btn">Search homes</button>
              </div>
            </div>
          </div>
        </div>
       @include('inc.account-footer')
      </div><!--account-content-->
    </div>
  </main>
@endsection


@push('js')
@endpush


@push('css')
<style>
</style>
@endpush