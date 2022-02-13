
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<section class="form-section">
    <div class="container">
        <div class="row py-3">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
{{--                <div class="logo">--}}
{{--                    <img src="{{asset('assets/img/logo/logo.png')}}" alt="" class="img-fluid w-25">--}}
{{--                </div>--}}
                <form action="{{route('register')}}" method="post" class="rounded shadow bg-white p-4 mt-3">
                    @csrf
                    <h3 class="text-dark fw-bolder fs-4 mb-2"> <span class="text-muted">--</span> Register Here <span class="text-muted">--</span></h3>
                    <div class="fw-normal text-muted mb-4">
                        Already have an account?
                        <a href="{{route('login')}}" class="text-decoration-none fw-bold">Sign In</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="John Misth" name="name" value="{{ old('name') }}">
                        <label for="name">Full Name</label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                        <label for="password">Password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                    <button class="w-100 btn btn-primary my-3">Register </button>
                    <div class="text-center text-secondary mb-3">OR</div>
                    <a href="#" class="btn btn-primary w-100 p-2 mb-3">
                        <img src="{{asset('assets/img/logo/facebook.svg')}}" alt="facebook logo" class="img-fluid me-1">
                        Continue with Facebook
                    </a>
                    <a href="#" class="btn btn-light w-100 p-2">
                        <img src="{{asset('assets/img/logo/google.svg')}}" alt="facebook logo" class="img-fluid me-1">
                        Continue with Google
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>
