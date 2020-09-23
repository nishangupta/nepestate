@extends('layouts.account-layout')

@section('content')
      <div class="account-content container-fluid">
        <div class="jumbotron">
          <h2 class="page-header">Edit Profile</h2>
          <hr>
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <div class="profile-changer">
                <div class="profile-pic-holder" id="profile-pic-holder">
                  <img src="{{ asset($user->userInfo->profile_img ?? 'img/changeprofile.png') }}" alt="user profile" class="img-fluid">
                </div>
                <div class="my-2 cursor-pointer">
                  <p class="text-info change-photo-bx" style="overflow-y: hidden;cursor:pointer">Change Picture
                    <form action="{{route('user.account.profileImgChange')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="file" class="photo-input" name="profileImg" onchange="this.form.submit()">
                    </form>
                  </p>
                </div>
                <h6>Who can see my Profile?</h6>
                <p>Your profile is private. If you have a Rental Resume, use its share setting to send it with rental
                  inquiries. No one else will see it.</p>
              </div><!-- profile changer-->
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="form">
                <form action="{{route('user.accountUpdate')}}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="">Your Email</label>
                  <input type="text" class="form-control" placeholder="Email" name="email" readonly value="{{$user->email}}">
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    {{-- <input type="text" class="form-control" placeholder="Password" value="{{Auth::user()->getAuthPassword()}}"> --}}
                    <a href="#" class="btn btn-secondary btn-block" id="changePasswordLink">Change Password</a>
                  </div>
                  <div class="form-group">
                    <label for="">Your Full Name</label>
                    <input type="text" class="form-control" placeholder="name" name="name" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                    <label for="">User Type</label>
                    <select name="user_type" id="" class="form-control">
                       @foreach ($userTypes as $val)
                        <option value="{{$val->id}}" {{ $val->id == $userType->id ? 'selected':''}} >
                          {{$val->user_type}}
                        </option>
                       @endforeach         
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" class="form-control" value="{{$user->userInfo->location ?? ''}}" >
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-2">
                        <label class="switch">
                          <input type="checkbox" name="rental" value="1" {{$user->userInfo->rental_inquiries ? 'checked':''}} >
                          <span class="slider"></span>
                        </label>
                      </div>
                      <div class="col-10">
                        <label for="">Send Rental inquiries with 1-click</label><br>
                        <small class="text-muted">When checked, we'll automatically resend the same info from your
                          last
                          inquiry</small>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-end">
                    <button class="btn btn-outline-dark mr-2" onclick="window.reload()">Cancel</button>
                    <button type="submit" class="btn btn-danger">Save Profile</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @include('inc.account-footer')
      </div>
@endsection


@push('js')
<script>
const triggerPasswordChange = document.querySelector('#changePasswordLink');
triggerPasswordChange.addEventListener('click',changePassword);
function changePassword(){
    swal.mixin({
      input: 'password',
      confirmButtonText: 'Next &rarr;',
      showCancelButton: true,
      progressSteps: ['1', '2', '3']
    }).queue([
      {
        title: 'Enter your password',
        text: 'Type your current password'
      },
      {
        title: 'Enter your new password',
        text:'Must be at least 8 characters.'
      },
      {
        title: 'Enter your password again',
      }
    ]).then((result) => {
      if (result.value) {
        const answers = result.value
        swal.queue([{
          title: 'Are You Sure ?',
          confirmButtonText: 'Change password!',
          showLoaderOnConfirm: true,
          preConfirm:()=>{
            return fetch('http://localhost:8000/account/user-profile/password-change',{
              method:"POST",
              body:JSON.stringify({
                currentPassword:answers[0],
                newPassword:answers[1],
                confirmPassword:answers[2]
              }),
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                "content-type" : "application/json"
              }
            })
              .then(response=>response.json())
              .then(data=>{
                console.log(data);
                if(data.passwordChange){
                swal.insertQueueStep({
                  icon:'success',
                  title:'Password Changed'
                  })
                }else{
                  swal.insertQueueStep({
                  icon:'error',
                  title:'Password Unchanged',
                  text:data.msg
                  })
                }
              })
              .catch(()=>{
                swal.insertQueueStep({
                  icon:'error',
                  title:'Unable to change password',
                  text:'Something went wrong'
                })
              })
          }
        }])
      }
  })
}
//profile pic viewer
const profileImg = document.getElementById('profile-pic-holder');
profileImg.addEventListener('click',function(){
  let img = profileImg.childNodes[0];
  let imgUrl = img.getAttribute('src');
  let height = img.clientHeight;
  swal.fire({
    imageUrl: imgUrl,
    imageWidth: 200,
    imageHeight: height+height/2,
    confirmButtonText: 'Close',
  })
});

</script>
@endpush


@push('css')
<style>

</style>
@endpush