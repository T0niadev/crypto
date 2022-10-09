@extends('admin.layouts.auth')

@section('content')
  <!-- Login basic -->
  <div class="card mb-0">
    <div class="card-body">
      <a href="" class="brand-logo">

        <h2 class="brand-text text-primary ms-1">CryptFX</h2>
      </a>

      <h4 class="card-title mb-1">Welcome to CryptFX! 👋</h4>
      <p class="card-text mb-2">Please sign-in to your account</p>

      <form class="auth-login-form mt-2" action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="mb-1">
          <label for="email" class="form-label">Email</label>
          <input placeholder="email.com" aria-describedby="email" tabindex="1" id="email" type="email"
            class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
            required autocomplete="email" autofocus />
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="mb-1">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            <a href="{{ route('admin.password.request') }}">
              <small>Forgot Password?</small>
            </a>
          </div>
          <div class="input-group input-group-merge form-password-toggle">
            <input class="form-control form-control-merge @error('password') is-invalid @enderror" tabindex="2"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password" id="password" type="password"
              class="form-control @error('password') is-invalid @enderror" name="password" required
              autocomplete="current-password" />
            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="mb-1">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" tabindex="3" name="remember"
              id="remember" {{ old('remember') ? 'checked' : '' }} />
            <label class="form-check-label" for="remember"> Remember Me </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
      </form>

      <!-- <p class="text-center mt-2">
        <span>New on our platform?</span>

          <span>Create an account</span>
        </a>
      </p> -->

      {{-- <div class="divider my-2">
        <div class="divider-text">or</div>
      </div>

      <div class="auth-footer-btn d-flex justify-content-center">
        <a href="#" class="btn btn-facebook">
          <i data-feather="facebook"></i>
        </a>
        <a href="#" class="btn btn-twitter white">
          <i data-feather="twitter"></i>
        </a>
        <a href="#" class="btn btn-google">
          <i data-feather="mail"></i>
        </a>
        <a href="#" class="btn btn-github">
          <i data-feather="github"></i>
        </a>
      </div> --}}
    </div>
  </div>
  <!-- /Login basic -->
@endsection
