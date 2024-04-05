@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">

        <form action="{{ route('ticket.respondprocess') }}" method="post" class="login-form">
            @csrf

            @if(session()->has('errors'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('errors'); }}
            </div>
            @endif

            
            <h5 class="mb-4"> Respond Ticket</h5>
            <input type="hidden" value="{{$userid}}" name="user_id">
            <input type="hidden" value="{{auth()->user()->id}}" name="staff_id">
            <input type="hidden" value="{{$ticket_id}}" name="ticket_id">
            
            <div class="mb-3">
                <label for="description" class="form-label" >Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
                @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">choose status</option>
                    <option value="1">Open</option>
                    <option value="2">Closed</option>
                </select>
                @if($errors->has('Status'))
                <div class="error">{{ $errors->first('Status') }}</div>
                @endif
            </div>

            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div> 
@endsection