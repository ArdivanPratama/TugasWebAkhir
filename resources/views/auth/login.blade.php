@extends('layouts.guest')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Fashion</b>Store</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Log in to start your session</p>

        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" :value="old('email')" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              {{$message}}
          @enderror
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
          {{$message}}
          @enderror
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

    <!--
        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
    -->
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection