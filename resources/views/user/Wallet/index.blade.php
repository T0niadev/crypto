@extends('layouts.app')

@section('content')
  <main class="main-content w-full px-[var(--margin-x)] pb-8">
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
              <p class="text-2xl font-semibold">$6,556.55</p>
              <p class="text-xs">+ 3.5%</p>
            </div>

            <div class="mt-4 flex space-x-7">
              <div>
                <p class="text-indigo-100">Deposit</p>
                <div class="mt-1 flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-full bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                    </svg>
                  </div>
                  {{-- <p class="text-base font-medium">$2,225.22</p> --}}
                </div>
              </div>
              <div>
                <p class="text-indigo-100">Withdrawal</p>
                <div class="mt-1 flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-full bg-black/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 13l-5 5m0 0l-5-5m5 5V6" />
                    </svg>
                  </div>
                  {{-- <p class="text-base font-medium">$225.22</p> --}}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-span-12 mt-5 sm:col-span-6 sm:mt-0 lg:col-span-8">
          <div class="swiper px-5 sm:pl-0" x-init="$nextTick(() => new Swiper($el, { slidesPerView: 'auto', spaceBetween: 16 }))">
            <div class="swiper-wrapper">
              <div
                class="swiper-slide relative h-40 w-64 shrink-0 rounded-lg bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
                <div class="absolute inset-0 flex flex-col justify-between rounded-lg border border-white/10 p-5">
                  <div class="flex items-center justify-between">
                    <img class="h-30" src="{{ asset('assets/images/payments/coins.png') }}" alt="image" />
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
                    <a href="" class="text-lg font-semibold tracking-wide">
                      CoinRemmiter
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
                                <a  href="" class="text-lg font-semibold tracking-wide">
                                    Paypal
                                </a>

                            </div>
                        </div>
                    </div> --}}
              <div
                class="swiper-slide relative h-40 w-64 shrink-0 rounded-lg bg-gradient-to-br from-[#ffffff55] to-[#ffffff20]">
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
                    <a href="" class="text-lg font-semibold tracking-wide">
                      Paypal
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
                  <p class="mt-1 text-xs font-medium">
                    Make Deposit With
                  </p>
                  <div class="text-white">
                    <a href="" class="text-lg font-semibold tracking-wide">
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
        <div class="my-3 flex flex-col justify-between px-4 sm:flex-row sm:items-center sm:px-5">
          <div class="flex flex-1 items-center justify-between space-x-2 sm:flex-initial">
            <h2 class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
              History
            </h2>
            <div x-data="usePopper({ placement: 'bottom-start', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
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
            <div class="space-y-4">
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
            </div>
          </div>
        </div>
      </div>

      <div class="col-span-12 px-4 lg:col-span-4">
        <div class="card bg-gradient-to-br from-purple-500 to-indigo-600 px-4 pb-4">
          <div class="mt-3 flex items-center justify-between text-white">
            <h2 class="text-sm+ font-medium tracking-wide">Your Balance</h2>
            <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false" class="inline-flex">
              <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-white/20 focus:bg-white/20 active:bg-white/25">
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
          <div class="flex w-9/12 items-center space-x-1">
            <p class="text-xs text-indigo-100 line-clamp-1">
              0x9CDBC28F0A6C13BB42ACBD3A3B366BFCAB07B8B1
            </p>
            <button
              class="btn h-5 w-5 shrink-0 rounded-full p-0 text-white hover:bg-white/20 focus:bg-white/20 active:bg-white/25">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewbox="0 0 20 20" fill="currentColor">
                <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z" />
                <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z" />
              </svg>
            </button>
          </div>
          <div class="mt-4 text-3xl font-semibold text-white">${{ number_format($walletBalance) }}</div>
          <p class="mt-3 text-xs text-indigo-100">Offers</p>
          <div class="flex justify-between">
            <span class="font-medium text-white">USD 35,000</span>
            <span class="text-right text-xs text-indigo-100">(55%) <i class="fa-solid fa-up-long text-tiny"></i></span>
          </div>

          <div class="flex space-x-4 items-center justify-between">
            <button
              class="btn mt-6 w-full border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30">
              <a href="{{ route('deposit.create') }}">Deposit</a>
            </button>
            <button
              class="btn mt-6 w-full border border-white/10 bg-white/20 text-white hover:bg-white/30 focus:bg-white/30">
              Withdraw
            </button>
          </div>
        </div>
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
