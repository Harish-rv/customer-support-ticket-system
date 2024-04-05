<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link rel="stylesheet" href="{{ url('assets/app.css') }}">
    <title>Customer Support Ticket System</title>
</head>
<body>
    <header>
        <div class="row header-box">
        <div class="col-4">
            <div class="m-3 d-flex align-items-center h-50 fs-5">Customer Support Ticket System</div>
        </div>
        <div class="col-4">
            @if(auth()->check())
            <div class="mt-4 fs-5 fw-bold text-center">Hello!  {{ auth()->user()->username }}</div>
            @endif
        </div>
        <div class="col-4">
            <ul>
                @if(!auth()->check())
                    <li><a href="{{ route('user.login') }}" style="padding: 5px 20px;">Login</a></li>
                    <li><a href="{{ route('user.register') }}"> Registration </a></li>
                @else
                    <li><a href="{{ route('user.logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
        </div>
    </header>
        @yield('content')
    </body>
</html>