@extends('template')
@section('title','Edit User')
@section('content') 
    <div class="dashboard">
        @include('header')
        @include('handling.error')
        @include('handling.success')
        <div class="row py-5">
            <h2>Edit</h2>
            <form action="{{url('/')}}" id="shown" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="_form">
                            @include('handling.error')
                <div class="body_form">
                    <div class="form_container">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control input_form" value="{{(old('username')?old('username'):$user->name)}}" readonly="">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="email">email</label>
                        <input type="text" name="email" id="email" class="form-control input_form" value="{{(old('email')?old('email'):$user->email)}}">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control input_form" value="">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="cpassword">Confirmation Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control input_form" value="">
                    </div>  
                    <div class="form_container">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="active" {{($user->meta->status === 'active'?'selected':'')}}>Active</option>
                            <option value="inactive" {{($user->meta->status === 'inactive'?'selected':'')}}>Inactive</option>
                        </select>
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="position">Position</label>
                        <select name="position" class="form-control" id="position">
                            <option value="staff" {{($user->meta->position == 'staff'?'selected':'')}}>Staff</option>
                            <option value="manager" {{($user->meta->position == 'manager'?'selected':'')}}>Manager</option>                            
                        </select>
                    </div>
                </div>   
                 <div class="footer_form mt-3">     
                    <a href="{{url('dashboard')}}" class="btn btn-logout">Back</a>                             
                    <input type="submit" class="mr-2 btn btn-secondary" value="Update">
                    <a href="" class="btn btn-danger" id="delete_user">Delete</a>
                    <input type="hidden" id="delete_route" value="{{url('api/user/'.$user->id.'/delete')}}">
                    <input type="hidden" id="edit_route" value="{{url('api/user/'.$user->id.'/edit')}}">
                    <input type="hidden" id="_tokenku" value="{{Auth::user()->api_token}}"> 
                </div>             
            </div>  
                    </form>     
    </div>
@endsection