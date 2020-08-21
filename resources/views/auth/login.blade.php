@extends('layouts.login')

@section('content')
<main>
  <div class="login-container">
    <div class="user-login">
      <h1 class="text-center"><a href="{{route('property.index')}}" class="login-brand">NepEstate</a></h1>
      <h4 class="my-2">Sign in or Register to save your favourite homes</h4>
      <form action="{{route('user.store')}}" method="POST">
        @csrf
        <div class="form-group mt-4 mb-2">
        <input type="text" placeholder="Email address" name="email" class="modal-email form-control" value="{{old('email')}}">
          <p class="d-none text-warning"><i class="fas fa-excamation-circle"></i> Email address</p>
        </div>
        <div class="form-group mb-2">
        <input type="password" placeholder="Password" class="modal-email form-control" name="password" value="">
          <p class="d-none text-warning"><i class="fas fa-excamation-circle"></i> Password</p>
        </div>
        <button type="submit" class="btn btn-block primary-btn" onclick="this.form.submit()">Submit</button>
      </form>
      <div class="text-right py-2">
        <a href="{{route('password.request')}}" class="text-light">Forgot Password ?</a>
      </div>
      <input type="hidden" user_email value="{{auth()->user()->email?? ''}}">
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
$(document).ready(function(){
  $userEmail = document.querySelector('[user_email]').value;
    if($userEmail !== ''){
      swal.fire({
      title:'You are already logged in as '+ $userEmail,
      text:'Do you want to log out!',
      icon:'question',
      showCancelButton: true,
      confirmButtonColor: '#0988A9',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Logout!'
    }).then((result)=>{
      if(result.value){
        window.location.href = '/account/logout';
      }else{
        window.location.href= '/';
      }
    });
  }
 
})
</script>
@endpush


@push('css')
<style>
</style>
@endpush

