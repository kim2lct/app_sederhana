@extends('template')
@section('title','Register New User')
@section('content') 
    <div class="auth_box login register">        
            <form action="{{ route('register.index')}}" method="POST" class="auth_box_form">
                @csrf                
            <div class="row">                                
                <div class="col-md-12">                    
                    <div class="_form">
                <div class="body_form">
                    <h2>Register New Member</h2>
                    @include('handling.error')
                    <div class="form_container">                        
                        <label class="form-label" for="username">Username <span class="required">*</span></label>
                        <input type="text" name="username" id="username" class="form-control input_form" placeholder="input your Username" value="{{old('username')}}">
                    </div>
                    <div class="form_container">                        
                        <label class="form-label" for="email">Email <span class="required">*</span></label>
                        <input type="text" name="email" id="email" class="form-control input_form" placeholder="input your Email" value="{{old('email')}}">
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="password">Password <span class="required">*</span></label>
                        <input type="password" name="password" id="password" class="form-control input_form" placeholder="input your password" >
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="cpassword">Password Confirmation <span class="required">*</span></label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control input_form" placeholder="input your password confirmation" >
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form_container">
                        <label class="form-label" for="position">Position</label>
                        <select name="position" class="form-control" id="position">
                            <option value="staff">Staff</option>
                            <option value="manager">Manager</option>                            
                        </select>
                    </div>
                </div>
                <div class="footer_form mt-3">
                    <input type="submit" class=" btn btn-primary btn-full" value="Register">                    
                </div>
            </div>            
            </div>            
            </div>
            </form>
    </div>
@endsection