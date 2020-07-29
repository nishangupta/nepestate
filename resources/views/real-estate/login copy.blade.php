@extends('layouts.login')

@section('content')
<main>
  <div class="login-container">
    <div class="user-login">
      <h1 class="text-center"><a href="{{route('property.index')}}" class="login-brand">NepEstate</a></h1>
      <h4 class="my-2">Sign in or Register to save your favourite homes</h4>
      <form action="">
        <div class="form-group mt-4 mb-2">
          <input type="text" placeholder="Email address" class="modal-email form-control">
          <p class="d-none text-warning"><i class="fas fa-excamation-circle"></i> Email address</p>
        </div>
        <div class="form-group mb-2">
          <input type="text" placeholder="Password" class="modal-email form-control">
          <p class="d-none text-warning"><i class="fas fa-excamation-circle"></i> Password</p>
        </div>
        <button type="submit" class="btn btn-block primary-btn">Submit</button>
      </form>
      <hr>
      <div>Or</div>
      <hr>
      <button class="btn btn-block btn-primary d-flex justify-content-center align-items-center">
        <i class="fab fa-facebook"></i> Continue with
        Facebook</button>
      <button class="btn btn-block btn-light d-flex justify-content-center align-items-center">
        <i class="fab fa-google"></i> Continue with Google
      </button>
      <p class="terms-conditions mt-2">By continuing, I accept Nepestate's <a href="#" class="primary-link">Terms of use</a> and <a
          href="#" class="primary-link">Privacy Policy.</a></p>
      <hr>
      <div class="login-footer">
        <div class="container text-center">
          <p class="">Are you a Real Estate Professional? <a href="#" class="text-light">Register Here</a></p>
        </div>
      </div>
    </div>
    <!--user-login-->
  </div>
  <!--Login container-->
</main>
@endsection


@push('js')
<script>

</script>
@endpush


@push('css')
<style>
</style>
@endpush

