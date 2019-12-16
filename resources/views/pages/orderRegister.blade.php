@extends('layouts.clientside') 

@section('content')
<link rel="stylesheet" href={{URL('css/orderRegister.css')}}>

<section class="steps" id="steps">
  <br> <br>
</section>
 
 <!-- <section class="register-form">
    <div class="centers">

            <div class="register">
                <h3>Enter Your Details.</h3>
                {!!Form::open(array(  'method'=>'POST', 'autocomplete'=>'off'))!!}
                <div class="form-group">
                    {{Form::label('names', 'Name:')}}
                    {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Your Name'])}}
                </div>
                <div class="form-group">
                    {{form::label('email', 'E-mail:')}}
                    {{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'youremail@something.com'])}}
                </div>
                <div class="form-group">
                    {{Form::label('pass', 'Password:')}}
                    {{Form::password('password',['class'=>'form-control','placeholder'=>'confirm password'])}}
                </div>
                <div class="form-group">
                    {{Form::label('confPass', 'Confirm Password')}}
                    {{Form::password('confPassword', ['class'=>'form-control','placeholder'=>'confirm password'])}}
                </div>
                <div class="form-group">
                    {{Form::label('phon', 'Phone:')}}
                    {{Form::text('phone', '', ['class'=>'form-control'])}}
                </div>

                <div style="text-align:center"><p><small>By filling out this form and agreeing to continue,  I accept the <a href="#">User Agreement</a>. </small></p></div>

                <div class="centre-btn" style="justify-content:center;  align-items: center; display:flex;">
                        {{Form::submit('Continue Securely', ['class'=>'btn btn-primary', 'id'=>'continue'])}}
                </div>
                

                <div style="text-align:center"><p><small>Have an account already? <a href="#">Sign in</a>. </small></p></div>
                
                {!!Form::close()!!}
            </div>

    </div>
   

</section> -->

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{__('Register') }}</div>

            <div class="card-body">
                <form method="POST" action="/register/ordering">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div style="text-align:center"><p><small>By filling out this form and agreeing to continue,  I accept the <a href="#">User Agreement</a>. </small></p></div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <div style="text-align:center"><p><small>Have an account already? <a href="/order/login">Sign in</a>. </small></p></div>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection