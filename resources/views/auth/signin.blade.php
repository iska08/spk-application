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
              <h3>Masuk</h3>
            </div>
            
            <form action="/login" method="POST">
              @csrf
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username">
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>
              <div class="mb-2 @error('password') mt-4 @enderror">
                Tidak mempunyai akun?
                <a href="/signup" class="text-decoration-none">Buat akun disini</a>
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk Sekarang</button>
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
