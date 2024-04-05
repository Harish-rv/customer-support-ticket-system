@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    
        <form action="{{route('user.login_process')}}" method="post" class="login-form">

            @if(session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message'); }}
            </div>
            @endif
            
            @csrf
            <h5 class="text-center mb-4"> User LogIn</h5>
      
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
                @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-3">  
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">
    
            <!-- <a class="mt-5" href="{{ route('user.register') }}"> User Registration </a> -->
        </form>
    </div> 
@endsection