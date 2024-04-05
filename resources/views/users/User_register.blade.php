@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center mt-4">
    
        <form action="{{route('user.register_process')}}" method="post" class="login-form">

            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message'); }}
            </div>
            @endif
            
            @csrf
            <h5 class="text-center mb-4">Registration Form</h5>
            <div class="mb-2">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" id="username" required>
                @if($errors->has('name'))
                <div class="error">{{ $errors->first('username') }}</div>
                @endif
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
                @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-2">  
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="mb-2">  
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="confirm_password" required>
                @if($errors->has('confirm_password'))
                <div class="error">{{ $errors->first('confirm_password') }}</div>
                @endif
            </div>

            <div class="mb-2">  
                <input type="radio" name="role" value="customer" id="user" checked><label for="user">&nbsp;Customer</label><br>
                <input type="radio" name="role" value="staff" id="staff"><label for="staff">&nbsp;Staff</label>
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div> 
@endsection