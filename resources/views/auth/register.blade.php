@extends('layouts.app')
@section('custom_css')
<style>
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
.card-title {
    margin-bottom: 0.3rem;
    min-height: 49px;
    font-size: 31px;

}

</style>

@endsection
@section('content')

<div class="container">
<hr>

<div class="card register-card register-login-box">

<article class="card-body mx-auto p-4" style="max-width: 400px;">
	<h4 class="card-title text-center">Register with us </h4>
	<p class="text-center">Welcome to healthmentors. Get started with your free account</p>
    @include('layouts.error')

	<!-- <p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p> -->
	<!-- <p class="divider-text">
        <span class="bg-light">OR</span>
    </p> -->
	<form method="POST" action="{{ route('register') }}" id="registerForm">
    @csrf
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> <!-- form-group// -->
   
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password_confirmation" class="form-control" placeholder="confirm password" type="password" required>
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> <!-- form-group// -->    
     <div class="form-group ">
         <input type="checkbox" name="isMentor"  id="isMentor" class="">
         <label for="">Are you a Health Mentor?</label> <br>
         (Gym Trainer/ Doctor / Relationship Coach / Yoga Teacher)
    </div>  
        <div class="form-group input-group d-none" id="mentors-type">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-chalkboard-teacher"></i> </span>
		</div>
        {{ mentorsType() }}
	</div> <!-- form-group end.// -->
         


    <div class="form-group">
        <button type="submit" class="btn btn-custom btn-block"> Create Account  </button>
    </div> <!-- form-group// -->  

    <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->




@endsection

@section('custom_js')
<script>

$(document).ready(function(){


$('#isMentor').on('click', function(){
    if($('#isMentor').prop('checked') === true) {
         $('#mentors-type').removeClass('d-none');
         $('#mentor-type-input').removeClass('d-none');
         $('#mentor-type-input').prop('required', true);
    }
    else {
        $('#mentors-type').addClass('d-none');
        $('#mentor-type-input').addClass('d-none');
        $('#mentor-type-input').prop('required', false);


    }
})

})

</script>

@endsection