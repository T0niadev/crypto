@extends('admin.layouts.auth')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Login') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
              @csrf

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                  </button>

                  @if (Route::has('admin.password.request'))
                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Login basic -->
  <div class="card mb-0">
    <div class="card-body">
      <a href="index.html" class="brand-logo">
        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
          <defs>
            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
              <stop stop-color="#000000" offset="0%"></stop>
              <stop stop-color="#FFFFFF" offset="100%"></stop>
            </lineargradient>
            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
              <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
              <stop stop-color="#FFFFFF" offset="100%"></stop>
            </lineargradient>
          </defs>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
              <g id="Group" transform="translate(400.000000, 178.000000)">
                <path class="text-primary" id="Path"
                  d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                  style="fill: currentColor"></path>
                <path id="Path1"
                  d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                  fill="url(#linearGradient-1)" opacity="0.2"></path>
                <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                  points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                  points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                  points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
              </g>
            </g>
          </g>
        </svg>
        <h2 class="brand-text text-primary ms-1">Vuexy</h2>
      </a>

      <h4 class="card-title mb-1">Welcome to Vuexy! 👋</h4>
      <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>

      <form class="auth-login-form mt-2"
        action="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template-bordered/index.html"
        method="POST">
        <div class="mb-1">
          <label for="login-email" class="form-label">Email</label>
          <input type="text" class="form-control" id="login-email" name="login-email"
            placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />
        </div>

        <div class="mb-1">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="login-password">Password</label>
            <a href="auth-forgot-password-basic.html">
              <small>Forgot Password?</small>
            </a>
          </div>
          <div class="input-group input-group-merge form-password-toggle">
            <input type="password" class="form-control form-control-merge" id="login-password" name="login-password"
              tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="login-password" />
            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
          </div>
        </div>
        <div class="mb-1">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
            <label class="form-check-label" for="remember-me"> Remember Me </label>
          </div>
        </div>
        <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
      </form>

      <p class="text-center mt-2">
        <span>New on our platform?</span>
        <a href="auth-register-basic.html">
          <span>Create an account</span>
        </a>
      </p>

      <div class="divider my-2">
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
      </div>
    </div>
  </div>
  <!-- /Login basic -->
@endsection
