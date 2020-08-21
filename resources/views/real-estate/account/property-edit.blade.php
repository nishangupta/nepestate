@extends('layouts.account-layout')
@section('content')
{{-- side-bar code in account-layout blade file --}}
<div class="account-content container-fluid">
  <div class="jumbotron">
    <h2 class="page-header">My Property Listings</h2>
    <hr>
    <a href="route('')" type="button" class="btn primary-btn">Add a new Listings</a>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="my-4">
          <div class="table-responsive">
            <table class="table table-striped table-light table-bordered my-2" id="dataTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>
            </table>
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

</style>
@endpush