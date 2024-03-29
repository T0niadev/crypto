<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="a0">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/apexcharts.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}" />

  <!-- Script -->
  <script defer src="{{ asset('assets/js/alpine.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
  <script>
    // ===== wow js
    new WOW().init();
  </script>
</head>

<body x-data="{
    scrolledFromTop: false
}" x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false"
  @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false" class="a1 dark:a2">
  <header x-data="{
      navbarOpen: false,
      dropdownOpen: false
  }" :class="scrolledFromTop ? 'a1 dark:a3 a4 dark:a4 a5 a6 ' : ' a7 dark:a7'"
    class="a8 a9 aa ab ac ad">
    <div class="ae">
      <div class="af ag aa ac ah">
        <div class="ai aj ak">
          <a href="{{ route('welcome') }}" :class="scrolledFromTop && '!al lg:!am'" class="an ab a2h lg:aW">
            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="logo" class="ab dark:ao" />
            <img src="{{ asset('assets/images/logo/logo-white.svg') }}" alt="logo" class="ao ab dark:an" />
          </a>
        </div>
          <div class="aa ap lg:a1m xl:a1n 2xl:a1o">
            <div class="a1p">
              <label for="darkToggler" class="aa a1q a1r a1s ac a1t a1u a1v dark:a1w[#1E2763]">
                <input type="checkbox" name="darkToggler" id="darkToggler" checked class="a1x"
                  aria-label="darkToggler" />
                <span class="aa a1y a1z ac a1t a1u a1A aT dark:a7 dark:aS">
                  <svg width="16" height="16" viewBox="0 0 16 16" class="a1B">
                    <path
                      d="M4.50663 3.2267L3.30663 2.03337L2.36663 2.97337L3.55996 4.1667L4.50663 3.2267ZM2.66663 7.00003H0.666626V8.33337H2.66663V7.00003ZM8.66663 0.366699H7.33329V2.33337H8.66663V0.366699ZM13.6333 2.97337L12.6933 2.03337L11.5 3.2267L12.44 4.1667L13.6333 2.97337ZM11.4933 12.1067L12.6866 13.3067L13.6266 12.3667L12.4266 11.1734L11.4933 12.1067ZM13.3333 7.00003V8.33337H15.3333V7.00003H13.3333ZM7.99996 3.6667C5.79329 3.6667 3.99996 5.46003 3.99996 7.6667C3.99996 9.87337 5.79329 11.6667 7.99996 11.6667C10.2066 11.6667 12 9.87337 12 7.6667C12 5.46003 10.2066 3.6667 7.99996 3.6667ZM7.33329 14.9667H8.66663V13H7.33329V14.9667ZM2.36663 12.36L3.30663 13.3L4.49996 12.1L3.55996 11.16L2.36663 12.36Z" />
                  </svg>
                </span>
                <span class="aa a1y a1z ac a1t a1u a7 aQ dark:a1A dark:aT">
                  <svg width="13" height="15" viewBox="0 0 13 15" class="a1B">
                    <path
                      d="M10.6111 12.855C11.591 12.1394 12.3151 11.1979 12.7723 10.1623C10.4824 10.4065 8.1342 9.46314 6.67948 7.47109C5.22476 5.47905 5.04093 2.95516 5.97054 0.848179C4.84491 0.968503 3.72768 1.37162 2.74781 2.08719C-0.224105 4.25747 -0.874706 8.43084 1.29558 11.4028C3.46586 14.3747 7.63923 15.0253 10.6111 12.855Z" />
                  </svg>
                </span>
              </label>
            </div>
            <div class="ao sm:aa">
              @if (Route::has('login'))
                <a href="{{ route('login') }}"
                  class="aa ac a1t a1u a1C a1D aw[9px] a1E a1F aP aQ a1G hover:a1H hover:a1A hover:aT dark:a1I dark:aT dark:hover:a1 dark:hover:aR lg:px-4 xl:px-8">
                  Sign In
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="af a2E a1J[120px]">
    <div class="ae">
      <div class="ag aa a1L">
        <div class="ab ak md:a1M/2 lg:a1U/12 xl:a1U/12">
          <div class="wow fadeInUp a2_ aH[330px] xl:a30" data-wow-delay="0s">
            <a href="index.html" class="a2a a2i">
              <img src="{{ asset('assets/images/logo/logo-white.svg') }}" alt="logo" class="ao dark:an" />
              <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="logo" class="dark:ao" />
            </a>
            <p class="a1W a1F a1R aQ dark:aS">
                Converts well, receive more
            </p>
            <div class="aa ac a31">
              <a href="javascript:void(0)"
                class="aa a32 a33 ac a1t a1u a1v aQ hover:a1A hover:aT dark:a3 dark:aT dark:hover:a1A"
                name="social-link" aria-label="social-link">
                <svg width="18" height="18" viewBox="0 0 20 20" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.25 8.46875C7.6875 8.46875 7.28125 8.96875 7.28125 9.53125C7.28125 10.0938 7.71875 10.5938 8.25 10.5938C8.8125 10.5938 9.21875 10.125 9.21875 9.53125C9.25 8.9375 8.8125 8.46875 8.25 8.46875Z"
                    fill="currentColor" />
                  <path
                    d="M11.75 10.5625C12.285 10.5625 12.7187 10.0868 12.7187 9.5C12.7187 8.9132 12.285 8.4375 11.75 8.4375C11.215 8.4375 10.7812 8.9132 10.7812 9.5C10.7812 10.0868 11.215 10.5625 11.75 10.5625Z"
                    fill="currentColor" />
                  <path
                    d="M16.4687 0.3125H3.53125C2.4375 0.3125 1.53125 1.1875 1.53125 2.28125V15.375C1.53125 16.4688 2.40625 17.3438 3.5 17.3438H14.4687L13.9375 15.5938L15.1562 16.75L16.3437 17.8437L18.4062 19.6875V2.28125C18.5 1.1875 17.5625 0.3125 16.4687 0.3125ZM12.7187 12.9375C12.7187 12.9375 12.375 12.5313 12.0625 12.1563C13.3437 11.8125 13.8125 11 13.8125 11C13.4062 11.25 13.0312 11.4375 12.7187 11.5625C12.25 11.7812 11.75 11.9062 11.3125 11.9687C10.375 12.1562 9.5625 12.0937 8.8125 11.9687C8.25 11.875 7.8125 11.7188 7.40625 11.5625C7.1875 11.4687 6.90625 11.375 6.6875 11.25C6.65625 11.25 6.65625 11.2188 6.59375 11.2188C6.59375 11.2188 6.5625 11.2187 6.5625 11.1875C6.375 11.0937 6.3125 11 6.3125 11C6.3125 11 6.8125 11.7813 8.03125 12.1563C7.71875 12.5 7.375 12.9375 7.375 12.9375C5.21875 12.8438 4.4375 11.5 4.4375 11.5C4.4375 8.375 5.84375 5.875 5.84375 5.875C7.25 4.8125 8.5625 4.875 8.5625 4.875L8.65625 5C6.875 5.46875 6.09375 6.25 6.09375 6.25C6.09375 6.25 6.3125 6.125 6.65625 6C7.71875 5.5625 8.5 5.4375 8.84375 5.375C8.875 5.375 8.9375 5.375 9.03125 5.375C9.59375 5.28125 10.3125 5.28125 10.9687 5.375C11.9062 5.46875 12.875 5.78125 13.875 6.3125C13.875 6.3125 13.125 5.59375 11.4375 5.09375L11.5625 4.90625C11.5625 4.90625 12.875 4.875 14.2812 5.90625C14.2812 5.90625 15.6875 8.40625 15.6875 11.5313C15.7187 11.5 14.875 12.9063 12.7187 12.9375Z"
                    fill="currentColor" />
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="aa a32 a33 ac a1t a1u a1v aQ hover:a1A hover:aT dark:a3 dark:aT dark:hover:a1A"
                name="social-link" aria-label="social-link">
                <svg width="18" height="15" viewBox="0 0 18 15" class="a1B">
                  <path
                    d="M17.7165 2.00016C17.0749 2.29183 16.3832 2.4835 15.6665 2.57516C16.3999 2.1335 16.9665 1.4335 17.2332 0.591829C16.5415 1.0085 15.7749 1.30016 14.9665 1.46683C14.3082 0.750163 13.3832 0.333496 12.3332 0.333496C10.3749 0.333496 8.77487 1.9335 8.77487 3.9085C8.77487 4.19183 8.8082 4.46683 8.86654 4.72516C5.89987 4.57516 3.2582 3.15016 1.49987 0.991829C1.19154 1.51683 1.01654 2.1335 1.01654 2.7835C1.01654 4.02516 1.64154 5.12516 2.6082 5.75016C2.01654 5.75016 1.46654 5.5835 0.983203 5.3335C0.983203 5.3335 0.983203 5.3335 0.983203 5.3585C0.983203 7.09183 2.21654 8.54183 3.84987 8.86683C3.54987 8.95016 3.2332 8.99183 2.9082 8.99183C2.6832 8.99183 2.4582 8.96683 2.24154 8.92516C2.69154 10.3335 3.99987 11.3835 5.57487 11.4085C4.3582 12.3752 2.81654 12.9418 1.1332 12.9418C0.84987 12.9418 0.566536 12.9252 0.283203 12.8918C1.86654 13.9085 3.74987 14.5002 5.76654 14.5002C12.3332 14.5002 15.9415 9.05016 15.9415 4.32516C15.9415 4.16683 15.9415 4.01683 15.9332 3.8585C16.6332 3.3585 17.2332 2.72516 17.7165 2.00016Z" />
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="aa a32 a33 ac a1t a1u a1v aQ hover:a1A hover:aT dark:a3 dark:aT dark:hover:a1A"
                name="social-link" aria-label="social-link">
                <svg width="16" height="16" viewBox="0 0 16 16" class="a1B">
                  <path
                    d="M13.8333 0.5C14.2754 0.5 14.6993 0.675595 15.0118 0.988155C15.3244 1.30072 15.5 1.72464 15.5 2.16667V13.8333C15.5 14.2754 15.3244 14.6993 15.0118 15.0118C14.6993 15.3244 14.2754 15.5 13.8333 15.5H2.16667C1.72464 15.5 1.30072 15.3244 0.988155 15.0118C0.675595 14.6993 0.5 14.2754 0.5 13.8333V2.16667C0.5 1.72464 0.675595 1.30072 0.988155 0.988155C1.30072 0.675595 1.72464 0.5 2.16667 0.5H13.8333ZM13.4167 13.4167V9C13.4167 8.27949 13.1304 7.5885 12.621 7.07903C12.1115 6.56955 11.4205 6.28333 10.7 6.28333C9.99167 6.28333 9.16667 6.71667 8.76667 7.36667V6.44167H6.44167V13.4167H8.76667V9.30833C8.76667 8.66667 9.28333 8.14167 9.925 8.14167C10.2344 8.14167 10.5312 8.26458 10.75 8.48338C10.9688 8.70217 11.0917 8.99891 11.0917 9.30833V13.4167H13.4167ZM3.73333 5.13333C4.10464 5.13333 4.46073 4.98583 4.72328 4.72328C4.98583 4.46073 5.13333 4.10464 5.13333 3.73333C5.13333 2.95833 4.50833 2.325 3.73333 2.325C3.35982 2.325 3.0016 2.47338 2.73749 2.73749C2.47338 3.0016 2.325 3.35982 2.325 3.73333C2.325 4.50833 2.95833 5.13333 3.73333 5.13333ZM4.89167 13.4167V6.44167H2.58333V13.4167H4.89167Z" />
                </svg>
              </a>
              <a href="javascript:void(0)"
                class="aa a32 a33 ac a1t a1u a1v aQ hover:a1A hover:aT dark:a3 dark:aT dark:hover:a1A"
                name="social-link" aria-label="social-link">
                <svg width="18" height="12" viewBox="0 0 18 12" class="a1B">
                  <path
                    d="M7.33366 8.49984L11.6587 5.99984L7.33366 3.49984V8.49984ZM16.967 1.97484C17.0753 2.3665 17.1503 2.8915 17.2003 3.55817C17.2587 4.22484 17.2837 4.79984 17.2837 5.29984L17.3337 5.99984C17.3337 7.82484 17.2003 9.1665 16.967 10.0248C16.7587 10.7748 16.2753 11.2582 15.5253 11.4665C15.1337 11.5748 14.417 11.6498 13.317 11.6998C12.2337 11.7582 11.242 11.7832 10.3253 11.7832L9.00033 11.8332C5.50866 11.8332 3.33366 11.6998 2.47533 11.4665C1.72533 11.2582 1.24199 10.7748 1.03366 10.0248C0.925326 9.63317 0.850326 9.10817 0.800326 8.44151C0.741992 7.77484 0.716992 7.19984 0.716992 6.69984L0.666992 5.99984C0.666992 4.17484 0.800326 2.83317 1.03366 1.97484C1.24199 1.22484 1.72533 0.741504 2.47533 0.533171C2.86699 0.424837 3.58366 0.349837 4.68366 0.299837C5.76699 0.241504 6.75866 0.216504 7.67533 0.216504L9.00033 0.166504C12.492 0.166504 14.667 0.299837 15.5253 0.533171C16.2753 0.741504 16.7587 1.22484 16.967 1.97484Z" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="ab ak sm:a1M/2 md:a1M/2 lg:a1U/12 xl:a12/12">
          <div class="wow fadeInUp a2_ xl:a30" data-wow-delay="0s">
            <h2 class="a2K a2B a1P a1k dark:aT">Quick Links</h2>
            <div class="a34">
              <a href="#home" class="an a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                About Us
              </a>
              <a href="#features" class="an a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                Services
              </a>
              <a href="#faq" class="an a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                FAQ
              </a>
              <a href="/register" class="an a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                Join Us Now
              </a>
            </div>
          </div>
        </div>
        <div class="ab ak sm:a1M/2 md:a1M/2 lg:a1U/12 xl:a12/12">
          <div class="wow fadeInUp a2_ xl:a30" data-wow-delay="0s">
            <h2 class="a2K a2B a1P a1k dark:aT">Supports</h2>
            <div class="a34">

              <a href="#contact" class="an a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                Help & Support
              </a>

              <a href="#contact" class="an a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                24/7 Supports
              </a>

            </div>
          </div>
        </div>
        {{-- <div class="ab ak md:a1M/2 lg:a1M/2 xl:a1U/12">
          <div class="wow fadeInUp a2_ xl:a30" data-wow-delay="0s">
            <h2 class="a2K a2B a1P a1k dark:aT">News & Post</h2>
            <div class="a34">
              <div class="aa">
                <div class="a20 aC[75px] ab aH[75px] a1X">
                  <img src="{{ asset('assets/images/footer/blog-01.jpg') }}" alt="post"
                    class="a2w ab a1X a2x a2y" />
                </div>
                <div>
                  <a href="javascript:void(0)" class="a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                    Roll Out New Features Without Hurting Loyal Users
                  </a>
                  <p class="aa ac">
                    <span class="a35 aQ dark:aS">
                      <svg width="14" height="16" viewBox="0 0 14 16" class="a1B">
                        <path
                          d="M3.25 8H4.75V9.5H3.25V8ZM13.75 3.5V14C13.75 14.3978 13.592 14.7794 13.3107 15.0607C13.0294 15.342 12.6478 15.5 12.25 15.5H1.75C0.9175 15.5 0.25 14.825 0.25 14V3.5C0.25 3.10218 0.408035 2.72064 0.68934 2.43934C0.970644 2.15804 1.35218 2 1.75 2H2.5V0.5H4V2H10V0.5H11.5V2H12.25C12.6478 2 13.0294 2.15804 13.3107 2.43934C13.592 2.72064 13.75 3.10218 13.75 3.5ZM1.75 5H12.25V3.5H1.75V5ZM12.25 14V6.5H1.75V14H12.25ZM9.25 9.5V8H10.75V9.5H9.25ZM6.25 9.5V8H7.75V9.5H6.25ZM3.25 11H4.75V12.5H3.25V11ZM9.25 12.5V11H10.75V12.5H9.25ZM6.25 12.5V11H7.75V12.5H6.25Z" />
                      </svg>
                    </span>
                    <span class="a1j a1R aQ dark:aS"> Dec 18, 2025 </span>
                  </p>
                </div>
              </div>
              <div class="aa">
                <div class="a20 aC[75px] ab aH[75px] a1X">
                  <img src="{{ asset('assets/images/footer/blog-02.jpg') }}" alt="post"
                    class="a2w ab a1X a2x a2y" />
                </div>
                <div>
                  <a href="javascript:void(0)" class="a1F a1R aQ hover:aR dark:aS dark:hover:aR">
                    Top 10 Best Cryptocurrency Blogs and Websites
                  </a>
                  <p class="aa ac">
                    <span class="a35 aQ dark:aS">
                      <svg width="14" height="16" viewBox="0 0 14 16" class="a1B">
                        <path
                          d="M3.25 8H4.75V9.5H3.25V8ZM13.75 3.5V14C13.75 14.3978 13.592 14.7794 13.3107 15.0607C13.0294 15.342 12.6478 15.5 12.25 15.5H1.75C0.9175 15.5 0.25 14.825 0.25 14V3.5C0.25 3.10218 0.408035 2.72064 0.68934 2.43934C0.970644 2.15804 1.35218 2 1.75 2H2.5V0.5H4V2H10V0.5H11.5V2H12.25C12.6478 2 13.0294 2.15804 13.3107 2.43934C13.592 2.72064 13.75 3.10218 13.75 3.5ZM1.75 5H12.25V3.5H1.75V5ZM12.25 14V6.5H1.75V14H12.25ZM9.25 9.5V8H10.75V9.5H9.25ZM6.25 9.5V8H7.75V9.5H6.25ZM3.25 11H4.75V12.5H3.25V11ZM9.25 12.5V11H10.75V12.5H9.25ZM6.25 12.5V11H7.75V12.5H6.25Z" />
                      </svg>
                    </span>
                    <span class="a1j a1R aQ dark:aS"> Dec 18, 2025 </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      <div class="wow fadeInUp a36 a2l[#F3F4F4] a37 a2G dark:a2l[#2D2C4A]" data-wow-delay="0s">
        <p class="a1F a1R a4u aQ dark:aS">
          © CryptFX - all Rights Reserved

        </p>
      </div>
    </div>
    <div class="aq a8 a1a a2Z">
      <img src="{{ asset('assets/images/shapes/footer-shape-2.svg') }}" alt="shape" />
    </div>
    <div class="aq a2J a19 a2Z">
      <img src="{{ asset('assets/images/shapes/footer-shape-1.svg') }}" alt="shape" />
    </div>
  </footer>

  <a x-show="scrolledFromTop" href="javascript:void(0)" name="scrollToTop" aria-label="scrollToTop"
    class="hover:a38 back-to-top ad a39 a3a a3b a2I[999] aa a32 a33 ac a1t au a1A aT a3c a3d">
    <span class="a10[6px] a3e a3f az a36 a3g a1I"></span>
  </a>

  <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll('.scroll-menu');

    pageLink.forEach((elem) => {
      elem.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector(elem.getAttribute('href')).scrollIntoView({
          behavior: 'smooth',
          offsetTop: 1 - 60,
        });
      });
    });

    // section menu active
    function onScroll(event) {
      const sections = document.querySelectorAll('.scroll-menu');
      const scrollPos =
        window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

      for (let i = 0; i < sections.length; i++) {
        const currLink = sections[i];
        const val = currLink.getAttribute('href');
        const refElement = document.querySelector(val);
        const scrollTopMinus = scrollPos + 73;
        if (
          refElement.offsetTop <= scrollTopMinus &&
          refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
        ) {
          document.querySelector('.scroll-menu').classList.remove('dark:aT', 'aR');
          currLink.classList.add('dark:aT', 'aR');
        } else {
          currLink.classList.remove('dark:aT', 'aR');
        }
      }
    }

    window.document.addEventListener('scroll', onScroll);

    // ====
    var options = {
      series: [73, 55, 38, 20],
      chart: {
        type: 'donut',
        width: 400,
      },
      colors: ['#2347B9', '#3363FF', '#8BA6FF', '#8696CA'],
      legend: {
        show: false,
      },
      stroke: {
        show: false,
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 200,
          },
          legend: {
            position: 'bottom',
          },
        },
      }, ],
    };

    var chart = new ApexCharts(document.querySelector('#chart'), options);
    chart.render();
  </script>
</body>

</html>
