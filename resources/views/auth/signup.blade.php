@extends('layouts.auth')

@section('content')
<div class="content mt-7 p-7 m-7">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="./images/hero.png" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
              <h3>Register</h3>
            </div>
            
            <form action="/signup" method="POST">
              @csrf
              <div class="form-group first">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" autocomplete="off" required>
                <label for="name">Fullname</label>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autocomplete="off" required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group last mb-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="my-2">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                
                @error('g-recaptcha-response')
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @enderror
              </div>
            
              <div class="mb-2 @error('password') mt-4 @enderror">
                Sudah Memiliki Akun
                <a href="/" class="text-decoration-none">Sign In</a>
              </div>
            
              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
              {{ date('l, d-m-Y') }}
              <?php date_default_timezone_set("Asia/jakarta"); ?> || <span id="jam" style="font-size:24"></span>
              <script type="text/javascript">
                window.onload = function () {
                  jam();
                }
              
                function jam() {
                  var e = document.getElementById('jam'),
                  d = new Date(), h, m, s;
                  h = d.getHours();
                  m = set(d.getMinutes());
                  s = set(d.getSeconds());
                
                  e.innerHTML = h + ':' + m + ':' + s;
                  setTimeout('jam()', 1000);
                }
              
                function set(e) {
                  e = e < 10 ? '0' + e : e;
                  return e;
                }
              </script>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
