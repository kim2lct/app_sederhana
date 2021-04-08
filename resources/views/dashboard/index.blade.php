@extends('template')
@section('title','Welcome Back, '.Auth::user()->name)
@section('content') 
    <div class="dashboard">
        @include('header')
        @include('handling.error')
        @include('handling.success')
        <div class="row py-5">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Position</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$users->firstItem()+$key}}</td>
                        <td><a href="{{url('user/'.$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{Str::title($user->meta->status)}}</td>
                        <td>{{Str::title($user->meta->position)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
            </div>
            <a class="btn btn-primary" href="{{route('user.create')}}">Create</a>
        </div>
    </div>
@endsection