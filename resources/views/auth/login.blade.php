
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<section class="form-section">
    <div class="container">
        <div class="row py-3">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <form action="{{route('login')}}" method="post" class="rounded shadow bg-white p-4 mt-3">
                    @csrf
                    <h3 class="text-dark fw-bolder fs-4 mb-2"> <span class="text-muted">--</span> Login Here <span class="text-muted">--</span></h3>
                    <div class="fw-normal text-muted mb-4">
                        Haven't an account? <a href="{{route('register')}}" class="text-decoration-none fw-bold">Register</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password"  name="password">
                        <label for="password">Password</label>
                    </div>
{{--                    <div class="text-end mt-2">--}}
{{--                        @if (Route::has('password.request'))--}}
{{--                            <a href="{{route('password.request')}}" class="text-decoration-none text-primary fw-bolder">Forget Password?</a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <button class="w-100 btn btn-primary my-3">Login </button>
                    <div class="text-center text-secondary mb-3">OR</div>
                    <a href="#" class="btn btn-primary w-100 p-2 mb-3">
                        <img src="assets/img/logo/facebook.svg" alt="facebook logo" class="img-fluid me-1">
                        Continue with Facebook
                    </a>
                    <a href="#" class="btn btn-light w-100 p-2">
                        <img src="assets/img/logo/google.svg" alt="facebook logo" class="img-fluid me-1">
                        Continue with Google
                    </a>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
