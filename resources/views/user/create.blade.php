@extends('template')
@section('title','Create New User')
@section('content') 
    <div class="dashboard">
        @include('header')
        @include('handling.error')
        @include('handling.success')
        <div class="row py-5">
            <h2>Create</h2>
            <form action="{{route('dashboard.index')}}" method="POST" id="create">
                        @csrf
                        @method('PATCH')
                        <div class="_form">
                            @include('handling.error')
                <div class="body_form">
                    <div class="form_container">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control input_form">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control input_form">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control input_form">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="cpassword">Confirmation Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control input_form">
                    </div>  
                    <div class="form_container">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="active" {{(old('status')==='active' ?'selected':'')}}>Active</option>
                            <option value="inactive" {{(old('status')==='inactive'?'selected':'')}}>Inactive</option>
                        </select>
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="position">Position</label>
                        <select name="position" class="form-control" id="position">
                            <option value="staff" {{(old('status')==='staff' ?'selected':'')}}>Staff</option>
                            <option value="manager" {{(old('status')==='manager' ?'selected':'')}}>Manager</option>                            
                        </select>
                    </div>
                </div>   
                 <div class="footer_form mt-3">                 
                    <a href="{{url('dashboard')}}" class="btn btn-logout">Back</a>               
                    <input type="submit" class="mr-2 btn btn-secondary" value="create">   
                    <input type="hidden" id="create_user" value="{{url('api/user/register')}}"> 
                    <input type="hidden" id="_tokenku" value="{{Auth::user()->api_token}}">                    
                </div>             
            </div>  
        </form>     
    </div>
@endsection