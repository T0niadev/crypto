@extends('layouts.app')

@section('content')
  <main class="main-content w-full px-[var(--margin-x)] pb-8">
  <div class="mt-4">
   <p class="text-2xl font-semibold">Welcome {{auth()->user()->username}}</p>
  </div>



    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Sorry, this payment method in currently unavailable in your country.</h3>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Contact us via email: support@cryptfxtrading.com for support and enquiries.</h3>

                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Back</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
      <div class="col-span-12 grid grid-cols-12 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 py-5 sm:py-6">
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
          <div class="px-4 text-white sm:px-5">
            <div class="-mt-1 flex items-center space-x-2">
              <h2 class="text-base font-medium tracking-wide">Wallet Balance</h2>
              <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false" class="inline-flex">
                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                  class="btn h-8 w-8 rounded-full p-0 hover:bg-white/20 focus:bg-white/20 active:bg-white/25">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                  </svg>
                </button>

                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                  <div
                    class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                    <ul>
                      <li>
                        <a href="#"
                          class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                      </li>
                      <li>
                        <a href="#"
                          class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                          Action</a>
                      </li>
                      <li>
                        <a href="#"
                          class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                          else</a>
                      </li>
                    </ul>
                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                    <ul>
                      <li>
                        <a href="#"
                          class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                          Link</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-3">
              <p class="text-2xl font-semibold">${{ number_format(auth()->user()->wallet) }}</p>
            </div>

            <div class="mt-4 flex space-x-7">
              <div>
                <p class="text-indigo-100">Deposit</p>
                <div class="mt-1 flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-full bg-black/20">
                    <a href="{{ route('depositform') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                        fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 11l5-5m0 0l5 5m-5-5v12" />
                      </svg></a>
                  </div>
                  {{-- <p class="text-base font-medium">$2,225.22</p> --}}
                </div>
              </div>
              <div>
                <p class="text-indigo-100">Withdrawal</p>
                <div class="mt-1 flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-full bg-black/20">
                    <a href="{{ route('withdrawal') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                        fill="none" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                      </svg></a>
                  </div>
                  {{-- <p class="text-base font-medium">$225.22</p> --}}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-span-12 mt-5 sm:col-span-6 sm:mt-0 lg:col-span-8">
          <div class="swiper px-5 sm:pl-0" x-init="$nextTick(() => new Swiper($el, { slidesPerView: 'auto', spaceBetween: 20 }))">
            <div class="swiper-wrapper">
              <div
                class="swiper-slide relative h-40 w-72 shrink-0 rounded-lg bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
                <div class="absolute inset-0 flex flex-col justify-between rounded-lg border border-white/10 p-5">
                  <div class="flex items-center justify-between">
                    <img class="h-30" src="{{ asset('assets/images/payments/Bitcoin.png') }}" alt="image" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-100" fill="none"
                      stroke="currentColor" viewbox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M5.343 7.257a.5.5 0 01.354.147 6.5 6.5 0 010 9.192.64.64 0 00-.073.087 4.718 4.718 0 01-.56-.094 1.301 1.301 0 01-.109-.03.5.5 0 01.035-.67 5.5 5.5 0 000-7.778.5.5 0 01.353-.854zm-.422 9.288a.06.06 0 010 0zM15 1.6a.5.5 0 01.354.147 14.5 14.5 0 010 20.506.5.5 0 11-.708-.707 13.5 13.5 0 000-19.092A.5.5 0 0115 1.6zM10.172 4.43a.5.5 0 01.353.146 10.5 10.5 0 010 14.85.5.5 0 11-.707-.707 9.5 9.5 0 000-13.436.5.5 0 01.354-.853z" />
                    </svg>
                  </div>
                  <div class="text-white">
                    <p class="mt-1 text-xs font-medium">
                      Make Deposit With
                    </p>
                    <a href="{{ route('depositform') }}" class="text-lg font-semibold tracking-wide">
                      Bitcoin
                    </a>
                    <p class="mt-1 text-xs font-medium">

                    </p>

                  </div>
                </div>
              </div>
              {{-- <div class="swiper-slide relative h-40 w-64 shrink-0 rounded-lg bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
                        <div class="absolute inset-0 flex flex-col justify-between rounded-lg border border-white/10 p-5">
                            <div class="flex items-center justify-between">
                            <img
                                class="h-30"
                                src="{{ asset('assets/images/payments/paypal.jpg' ) }}"
                                alt="image"
                            />
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-indigo-100"
                                fill="none"
                                stroke="currentColor"
                                viewbox="0 0 24 24"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M5.343 7.257a.5.5 0 01.354.147 6.5 6.5 0 010 9.192.64.64 0 00-.073.087 4.718 4.718 0 01-.56-.094 1.301 1.301 0 01-.109-.03.5.5 0 01.035-.67 5.5 5.5 0 000-7.778.5.5 0 01.353-.854zm-.422 9.288a.06.06 0 010 0zM15 1.6a.5.5 0 01.354.147 14.5 14.5 0 010 20.506.5.5 0 11-.708-.707 13.5 13.5 0 000-19.092A.5.5 0 0115 1.6zM10.172 4.43a.5.5 0 01.353.146 10.5 10.5 0 010 14.85.5.5 0 11-.707-.707 9.5 9.5 0 000-13.436.5.5 0 01.354-.853z"
                                />
                            </svg>
                            </div>

                            <div class="text-white">
                                <p class="mt-1 text-xs font-medium">
                                Make Deposit With
                                </p>


                            </div>
                        </div>
                    </div> --}}
              <div
                class="swiper-slide relative h-40 w-72 shrink-0 rounded-lg bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
                <div class="absolute inset-0 flex flex-col justify-between rounded-lg border border-white/10 p-5">
                  <div class="flex items-center justify-between">
                    <img class="h-30" src="{{ asset('assets/images/payments/paypal.png') }}" alt="image" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-100" fill="none"
                      stroke="currentColor" viewbox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M5.343 7.257a.5.5 0 01.354.147 6.5 6.5 0 010 9.192.64.64 0 00-.073.087 4.718 4.718 0 01-.56-.094 1.301 1.301 0 01-.109-.03.5.5 0 01.035-.67 5.5 5.5 0 000-7.778.5.5 0 01.353-.854zm-.422 9.288a.06.06 0 010 0zM15 1.6a.5.5 0 01.354.147 14.5 14.5 0 010 20.506.5.5 0 11-.708-.707 13.5 13.5 0 000-19.092A.5.5 0 0115 1.6zM10.172 4.43a.5.5 0 01.353.146 10.5 10.5 0 010 14.85.5.5 0 11-.707-.707 9.5 9.5 0 000-13.436.5.5 0 01.354-.853z" />
                    </svg>
                  </div>
                  <div class="text-white">
                    <p class="mt-1 text-xs font-medium">
                      Make Deposit With
                    </p>
                    <a class='cursor-pointer' data-modal-toggle="popup-modal">
  PayPal
              </a>


                    <p class="mt-1 text-xs font-medium">
                      **** **** **** 8945
                    </p>
                  </div>
                </div>
              </div>
              <div
                class="swiper-slide relative h-40 w-64 shrink-0 rounded-lg bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
                <div class="absolute inset-0 flex flex-col justify-between rounded-lg border border-white/10 p-5">
                  <div class="flex items-center justify-between">
                    <img class="h-20" src="{{ asset('assets/images/payments/stripe.png') }}" alt="image" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-100" fill="none"
                      stroke="currentColor" viewbox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M5.343 7.257a.5.5 0 01.354.147 6.5 6.5 0 010 9.192.64.64 0 00-.073.087 4.718 4.718 0 01-.56-.094 1.301 1.301 0 01-.109-.03.5.5 0 01.035-.67 5.5 5.5 0 000-7.778.5.5 0 01.353-.854zm-.422 9.288a.06.06 0 010 0zM15 1.6a.5.5 0 01.354.147 14.5 14.5 0 010 20.506.5.5 0 11-.708-.707 13.5 13.5 0 000-19.092A.5.5 0 0115 1.6zM10.172 4.43a.5.5 0 01.353.146 10.5 10.5 0 010 14.85.5.5 0 11-.707-.707 9.5 9.5 0 000-13.436.5.5 0 01.354-.853z" />
                    </svg>
                  </div>

                    <p class="mt-1 text-white font-medium">
                      Make Deposit With
                    </p>
                    <div class="text-white">
                    <a class='cursor-pointer' data-modal-toggle="popup-modal">
                      Stripe
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card group col-span-12 pb-5 lg:col-span-8">

        <script src="https://widgets.coingecko.com/coingecko-coin-compare-chart-widget.js"></script>
        <coingecko-coin-compare-chart-widget class="w-full" coin-ids="bitcoin,ethereum,eos,ripple,litecoin"
          currency="usd" locale="en">
        </coingecko-coin-compare-chart-widget>

        <!-- <div class="my-3 flex flex-col justify-between px-4 sm:flex-row sm:items-center sm:px-5">
          <div class="flex flex-1 items-center justify-between space-x-2 sm:flex-initial">
            <h2 class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
              Rates
            </h2>
            <div x-data="usePopper({ placement: 'bottom-start', offset: 19 })" @click.outside="if(isShowPopper) isShowPopper = false"
              :class="!isShowPopper && 'sm:opacity-0'"
              class="inline-flex focus-within:opacity-100 group-hover:opacity-100">
              <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
              </button>

              <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                <div
                  class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">

                </div>
              </div>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <div class="flex cursor-pointer items-center space-x-2">
              <div class="h-3 w-3 rounded-full bg-accent"></div>
              <p>Investments</p>
            </div>
            <div class="flex cursor-pointer items-center space-x-2">
              <div class="h-3 w-3 rounded-full bg-info"></div>
              <p>Returns</p>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-12 gap-4 px-4 sm:gap-5 sm:px-5 lg:gap-6 lg:px-5">
          <div class="col-span-12 sm:order-last sm:col-span-6 sm:mt-2 xl:col-span-7">
            <div class="ax-transparent-gridline">
              <div x-init="$nextTick(() => {
                  $el._x_chart = new ApexCharts($el, pages.charts.historyTransactionsLine);
                  $el._x_chart.render()
              });"></div>
            </div>

          </div>
          <div class="col-span-12 rounded-lg bg-slate-50 p-3 dark:bg-navy-600 sm:col-span-6 xl:col-span-5">
            {{-- <div class="space-y-4">
              <div class="flex cursor-pointer items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <img class="rounded-full" src="{{ asset('assets/images/blogs/blog-detail.jpg') }}"
                      alt="avatar" />
                  </div>
                  <div>
                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                      WIT24-08-22-01
                    </p>
                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-200">
                      Dec 21, 2021 - 08:05
                    </p>
                  </div>
                </div>
                <p class="font-medium text-success">$660.22</p>
              </div>
              <div class="flex cursor-pointer items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <img class="rounded-full" src="{{ asset('assets/images/blogs/blog-detail.jpg') }}"
                      alt="avatar" />
                  </div>
                  <div>
                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                      WIT24-08-22-02
                    </p>
                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-200">
                      Dec 19, 2021 - 11:55
                    </p>
                  </div>
                </div>
                <p class="font-medium text-success">$33.63</p>
              </div>
              <div class="flex cursor-pointer items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <img class="rounded-full" src="{{ asset('assets/images/blogs/blog-detail.jpg') }}"
                      alt="avatar" />
                  </div>
                  <div>
                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                      Dep24-08-22-03
                    </p>
                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-200">
                      Dec 16, 2021 - 14:45
                    </p>
                  </div>
                </div>
                <p class="font-medium text-success">$674.63</p>
              </div>
              <div class="flex cursor-pointer items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <img class="rounded-full" src="{{ asset('assets/images/blogs/blog-detail.jpg') }}"
                      alt="avatar" />
                  </div>
                  <div>
                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                      DEP24-08-22-01
                    </p>
                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-200">
                      Dec 13, 2021 - 11:30
                    </p>
                  </div>
                </div>
                <p class="font-medium text-error">$547.63</p>
              </div>
              <div class="flex cursor-pointer items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <img class="rounded-full" src="{{ asset('assets/images/blogs/blog-detail.jpg') }}"
                      alt="avatar" />
                  </div>
                  <div>
                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                      DEP24-08-22-02
                    </p>
                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-200">
                      Dec 10, 2021 - 09:41
                    </p>
                  </div>
                </div>
                <p class="font-medium text-success">$736.24</p>
              </div>
              <div class="flex cursor-pointer items-center justify-between">
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <img class="rounded-full" src="{{ asset('assets/images/blogs/blog-detail.jpg') }}"
                      alt="avatar" />
                  </div>
                  <div>
                    <p class="text-slate-700 line-clamp-1 dark:text-navy-100">
                      DEP24-08-22-01
                    </p>
                    <p class="text-xs text-slate-400 line-clamp-1 dark:text-navy-200">
                      Dec 06, 2021 - 11:41
                    </p>
                  </div>
                </div>
                <p class="font-medium text-success">$558.88</p>
              </div>
            </div> --}}

          </div>
        </div> -->
      </div>

      <div class="card col-span-12 px-4 pb-5 sm:px-5 lg:col-span-4">
        <div class="flex items-center justify-between py-3">
          <h2 class="font-medium text-xl tracking-wide text-slate-700 dark:text-navy-100">
            Investment Packages
          </h2>
        </div>
        <div class="mx-auto">
          {{-- <div class="avatar h-8 w-8 hover:z-10"> --}}
          <img class="rounded-full ring ring-white dark:ring-navy-700"
            src="{{ asset('assets/images/blogs/image-01.jpg') }}"  />

        </div>

        <div class="mt-2 text-md space-y-4">
          <i>
            Take advantage of the specially curated investment packages we have for you
          </i>
          <p>
            <a class="text-lg text-medium" href="{{ route('investment') }}">Click Here</a>
          </p>
        </div>

        <div class="avatar h-8 w-8 hover:z-10">
          {{-- <div
                    class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700"
                >
                    jd
                </div> --}}
        </div>

        {{-- <div class="avatar h-8 w-8 hover:z-10">
                <img
                    class="rounded-full ring ring-white dark:ring-navy-700"
                    src="{{ asset('assets/images/avatar/avatar-20.jpg' ) }}"
                    alt="avatar"
                />
                </div> --}}

        {{-- <div class="avatar h-8 w-8 hover:z-10">
                <img
                    class="rounded-full ring ring-white dark:ring-navy-700"
                    src="{{ asset('assets/images/avatar/avatar-19.jpg' ) }}"
                    alt="avatar"
                />
                </div> --}}
      </div>
      {{-- <div class="mt-2 flex items-center justify-between">
                <p class="text-xs+">View All Contacts</p>

                <button
                class="btn -mr-1 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewbox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                    />
                </svg>
                </button>
            </div>
            <div class="mt-2 space-y-4">
                <label class="block">
                <span class="text-xs+">Pay to</span>
                <input
                    x-input-mask="{
                            creditCard: true
                        }"
                    class="form-input mt-1.5 h-9 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="**** **** **** ****"
                    type="text"
                />
                </label>
                <div>
                <span class="text-xs+">Amount</span>

                <div class="mt-1.5 flex h-9 -space-x-px">
                    <select
                    class="form-select rounded-l-lg border border-slate-300 bg-white px-3 py-2 pr-9 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent"
                    >
                    <option>$</option>
                    <option>£</option>
                    <option>€</option>
                    </select>
                    <input
                    class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Price"
                    type="text"
                    />
                </div>
                </div>
            </div>
            <div
                class="mt-5 flex justify-between text-slate-400 dark:text-navy-300"
            >
                <p class="text-xs+">Commission:</p>
                <p>3$</p>
            </div>
            <div class="mt-2 flex justify-between">
                <p>Total:</p>
                <p class="font-medium text-slate-700 dark:text-navy-100">3$</p>
            </div>
            <button
                class="btn mt-5 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
            >
                deposit
            </button> --}}
    </div>

    </div>
  </main>
@endsection
