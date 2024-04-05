@extends('layouts.app')
@section('content')

<div class="wrapper">
    <div style="margin: 18px;"><a href="{{ route('ticket.add') }}" class="cticket">Create Ticket</a></div>
    <div class="content-box">
        @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
        @endif

    
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $key => $ticketList)
                <tr>
                    <th >{{ $key+1; }}</th>
                    <td>{{ $ticketList->user->username; }}</td>
                    <td>{{ $ticketList->title; }}</td>
                    <td>{{ $ticketList->description; }}</td>
                    @if($ticketList->status==1)
                        <td><a href="" class="text-danger fw-bold"> Open</a></td>
                    @elseif($ticketList->status==2)
                        <td><a href="" class="text-success fw-bold"> closed</a></td>
                    @endif
                    <td>
                        @if(auth()->user()->role=='staff')
                        <a href="{{route('ticket.respond',['id' => $ticketList->user->id, 'ticket_id' => $ticketList->id])}}" class="btn btn-primary">Respond</a>
                        @endif
                    </td>  
                </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            let table = new DataTable('#datatable');
        </script>
    </div>
</div>
@endsection