@extends('layouts.auth')

@section('content')
  <main>
    <section class="af a2E a1J[180px] a4D[120px]">
      <div class="ae">
        <div class="a3i[-16px] aa a1L">
          <div class="ab ak">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="wow fadeInUp a3r aH[500px] a1X a1C a2l[#f5f5f5] a1 a2P dark:a4E dark:a3 sm:a4j[60px]"
                data-wow-delay="0s">
                <h3 class="a2d a2G a2B a1P a1k dark:aT sm:a2o">
                  Sign in to your account
                </h3>
                <p class="a4w a2G a1F a1R aS">
                  Login to your account for a faster checkout.
                </p>
                <a href="{{ route('google.login') }}"
                  class="aa ac a1t a1u a1C a1D aw[9px] a1E a1F aP aQ a1G hover:a1H hover:a1A hover:aT dark:a1I dark:aT dark:hover:a1 dark:hover:aR lg:px-4 xl:px-8">
                  <span class="a2k">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_95:967)">
                        <path
                          d="M20.0001 10.2216C20.0122 9.53416 19.9397 8.84776 19.7844 8.17725H10.2042V11.8883H15.8277C15.7211 12.539 15.4814 13.1618 15.1229 13.7194C14.7644 14.2769 14.2946 14.7577 13.7416 15.1327L13.722 15.257L16.7512 17.5567L16.961 17.5772C18.8883 15.8328 19.9997 13.266 19.9997 10.2216"
                          fill="#4285F4" />
                        <path
                          d="M10.2042 20.0001C12.9592 20.0001 15.2721 19.1111 16.9616 17.5778L13.7416 15.1332C12.88 15.7223 11.7235 16.1334 10.2042 16.1334C8.91385 16.126 7.65863 15.7206 6.61663 14.9747C5.57464 14.2287 4.79879 13.1802 4.39915 11.9778L4.27957 11.9878L1.12973 14.3766L1.08856 14.4888C1.93689 16.1457 3.23879 17.5387 4.84869 18.512C6.45859 19.4852 8.31301 20.0005 10.2046 20.0001"
                          fill="#34A853" />
                        <path
                          d="M4.39911 11.9777C4.17592 11.3411 4.06075 10.673 4.05819 9.99996C4.0623 9.32799 4.17322 8.66075 4.38696 8.02225L4.38127 7.88968L1.19282 5.4624L1.08852 5.51101C0.372885 6.90343 0.00012207 8.4408 0.00012207 9.99987C0.00012207 11.5589 0.372885 13.0963 1.08852 14.4887L4.39911 11.9777Z"
                          fill="#FBBC05" />
                        <path
                          d="M10.2042 3.86663C11.6663 3.84438 13.0804 4.37803 14.1498 5.35558L17.0296 2.59996C15.1826 0.901848 12.7366 -0.0298855 10.2042 -3.6784e-05C8.3126 -0.000477834 6.45819 0.514732 4.8483 1.48798C3.2384 2.46124 1.93649 3.85416 1.08813 5.51101L4.38775 8.02225C4.79132 6.82005 5.56974 5.77231 6.61327 5.02675C7.6568 4.28118 8.91279 3.87541 10.2042 3.86663Z"
                          fill="#EB4335" />
                      </g>
                      <defs>
                        <clipPath id="clip0_95:967">
                          <rect width="20" height="20" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  Sign in with Google
                </a>
                <div class="a2n aa ac a1t">
                  <span class="ao aC[1px] ab aH[70px] a2m a4H sm:an"></span>
                  <p class="ab a23 a2G a1F a1R aQ dark:aS">
                    Or, sign in with your email or username
                  </p>
                  <span class="ao aC[1px] ab aH[70px] a2m a4H sm:an"></span>
                </div>
                <form>
                  <div class="a2n">
                    <label for="login" class="a2d an a1j a1R a2u dark:aT">
                      Username or Email
                    </label>
                    <input type="text" name="login" placeholder="Enter your Email or Username"
                      class="a4F dark:a38 ab a1u a1C a27 a4z a22 aI a1F dark:aS a4I a24 focus:a1H focus-visible:aM dark:a4G dark:a1w[#1F2656] @error('email') border-red-500 @enderror @error('username') border-red-500 @enderror"
                      id="login" value="{{ old('username') ?: old('email') }}" required autocomplete="email" autofocus />

                    @error('email')
                      <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                      </p>
                    @enderror
                    @error('username')
                      <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                      </p>
                    @enderror
                  </div>
                  <div class="a2n">
                    <label for="password" class="a2d an a1j a1R a2u dark:aT">
                      Your Password
                    </label>
                    <input type="password" name="password" placeholder="Enter your Password"
                      class="a4F dark:a38 ab a1u a1C a27 a4z a22 aI a1F dark:aS a4I a24 focus:a1H focus-visible:aM dark:a4G dark:a1w[#1F2656] @error('password') border-red-500 @enderror"
                      id="password" required />

                    @error('password')
                      <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                      </p>
                    @enderror
                  </div>
                  <div class="a2n aa ac ah">
                    <div>
                      <label for="remember" class="aa a1s a4J ac a1j a1R aQ dark:aS">
                        <div class="af">
                          <input type="checkbox" class="a1x" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }} />
                          <div class="box a1p aa a4n a4x ac a1t a1i a1C a27 a4G dark:a1I dark:a28">
                            <span class="aE">
                              <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                  fill="#3056D3" stroke="#3056D3" stroke-width="0.4" />
                              </svg>
                            </span>
                          </div>
                        </div>
                        Keep me signed in
                      </label>
                    </div>
                    <div>
                      <a href="javascript:void(0)" class="a1j a1R aR hover:a2z">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <div class="a2a">
                    <button type="submit" class="hover:a38 aa ab ac a1t a1u a1A al a4K a1F a1R aT a3d a1c a4L hover:a4">
                      Sign in
                    </button>
                  </div>
                </form>
                <p class="a2G a1F a1R aQ dark:aS">
                  Don't have an account?
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="aR hover:a2z">
                      Sign up
                    </a>
                  @endif
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="aq a8 a1a a2Z a2w ab a3D"
        style="
                  background-image: linear-gradient(
                    180deg,
                    #3e7dff 0%,
                    rgba(62, 125, 255, 0) 100%
                  );
                ">
      </div>
      <img src="{{ asset('assets/images/shapes/hero-shape-1.svg') }}" alt="" class="aq a1a a8 a2Z" />
      <img src="{{ asset('assets/images/shapes/hero-shape-2.svg') }}" alt="" class="aq a19 a8 a2Z" />
    </section>
  </main>
@endsection
