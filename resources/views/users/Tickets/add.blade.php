@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">

        <form action="{{ route('ticket.addprocess') }}" method="post" class="login-form">
            @csrf

            @if(session()->has('errors'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('errors'); }}
            </div>
            @endif

            
            <h5 class="mb-4"> Create Ticket</h5>
            <input type="hidden" name="user_id" value="{{ auth()->user()?auth()->user()->id:''; }}">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
                @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
                @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div> 
@endsection