<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Absensi</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/LogoCN.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>
    <div id="auth" class="d-flex align-items-center">
        <div class="d-flex container-fluid justify-content-center">
            <div class="card pt-4" style="width: 60vh; height: 100%">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <h3>Login</h3>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group position-relative has-icon-left">
                            <label for="email">Username</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="email" name="name">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <div class="clearfix">
                                <label for="password">Password</label>
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix justify-content-center d-flex">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
