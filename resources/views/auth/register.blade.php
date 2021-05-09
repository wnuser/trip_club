@extends('layouts.app')

@section('custom_css')
  <style>
  .register{
    background: -webkit-linear-gradient(left, #0083ef, #619ddaba);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left .login-btn{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: -6%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}


  </style>
@endsection

@section('content')

<div class="container register mb-5">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <!-- <p></p> -->
                        <p >Have already account just login!</p>
                        <!-- <input type="submit" name="" value="Login"/><br/> -->
                        <a href="{{ route('login') }}"  class="btn login-btn">Login</a>
                    </div>
                    <div class="col-md-9 register-right">
                        <!-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Hirer</a>
                            </li>
                        </ul> -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Become a Health Mentor</h3>
                                <form method="POST" action="{{ route('register') }}">
                                <!-- <p>You are 30 seconds away from becoming a popular health mentor!</p> -->
                                @csrf
                                <div class="row register-form">
                                    <div class="col-12">
                                    @include('layouts.error')

                                    </div>
                                
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Your Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password *" value="" />
                                        </div>
                                        <input type="hidden" name="user_type" value="{{ config('role.ROLES.MENTOR.TYPE') }}">
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="mobile" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            {{ updateCountry() }}
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="state" name="state">
                                                <option class="hidden"  selected disabled>Please select your State</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" id="city" name="city">
                                                <option class="hidden"  selected disabled>Please select your City</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" name="domain">
                                                <option class="hidden"  selected disabled>Please select your Domain</option>
                                                @php $mentorTypes   = config('role.MENTORSTITLE'); @endphp
                                                @foreach($mentorTypes as $key => $value)
                                                    <option value="{{$key}}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        <input type="submit" class="btn-custom-reverse"  value="Register"/>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Hirer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@endsection

@section('custom_js')

<script>

$('#state').on('change', function(){
   var stateId   = $('#state').val();
//    alert(stateId);

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

   $.ajax({
       method: "POST",
       url: "/get/city",
       data : {stateId:stateId},
       success:function(data){
          $('#city').empty();
          $('#city').append(data);
       },
       error:function(){

       }
   })
});




$('#country').on('change', function(){
   var countryId   = $('#country').val();

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

   $.ajax({
       method: "POST",
       url: '/get/state',
       data : {countryId: countryId},
       success:function(data){
            console.log(data);
            $('#state').empty();
            $('#state').append(data);
            
       },
       error:function(){

       }

   })
});

</script>
@endsection

