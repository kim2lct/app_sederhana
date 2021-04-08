@extends('template')
@section('title','Login to Dashboard')
@section('content') 
<div class="auth_wrapper">
    <div class="auth_box login">        
            <form action="{{ route('login.index')}}" method="POST" class="auth_box_form">
                @csrf                
            <div class="row">                
                <div class="col-md-5 bg-form">
                    <div class="logo_form">
                        <img width="200px" src="{{url('images/logo.png')}}" alt="logo">
                    </div>                    
                </div>
                <div class="col-md-7">
                    <div class="_form">
                <div class="body_form">
                    @include('handling.error')
                    @include('handling.success')
                    <div class="form_container">                        
                        <label class="form-label" for="name">Username</label>
                        <input type="text" name="name" id="name" class="form-control input_form" placeholder="input your Username" value="{{old('name')}}">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control input_form" placeholder="input your password" >
                    </div>
                </div>
                <div class="footer_form mt-3">
                    <input type="submit" class=" btn btn-primary btn-full" value="Login">
                    <p>Dont have an account register here? <a href="{{route('register.index')}}">Register</a></p>
                </div>
            </div>            
            </div>            
            </div>
            </form>
    </div>
    </div>
@endsection