
@extends('layouts.app')

@section('content')
  <!-- Main Content Wrapper -->
  <main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="mt-5 flex items-center justify-between">
      <h3
        class="text-lg font-medium text-slate-700 line-clamp-1 dark:text-navy-50"
      >
        Transactions Overview
      </h3>
      <div class="flex">
        <button
          class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewbox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
            />
          </svg>
        </button>
        <button
          class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewbox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
        </button>
      </div>
    </div>

    <div class="mt-4 grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
      <div class="card group col-span-12 lg:col-span-7">
        <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
          <div
            class="flex flex-1 items-center justify-between space-x-2 sm:flex-initial"
          >
            <h2
              class="text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100"
            >
              Transaction History
            </h2>
            <div
              x-data="usePopper({placement:'bottom-start',offset:4})"
              @click.outside="if(isShowPopper) isShowPopper = false"
              :class="!isShowPopper && 'sm:opacity-0'"
              class="inline-flex focus-within:opacity-100 group-hover:opacity-100"
            >
              <button
                x-ref="popperRef"
                @click="isShowPopper = !isShowPopper"
                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewbox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                  />
                </svg>
              </button>

              <div
                x-ref="popperRoot"
                class="popper-root"
                :class="isShowPopper && 'show'"
              >
                <div
                  class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700"
                >
                  <ul>
                    <li>
                      <a
                        href="#"
                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        >Action</a
                      >
                    </li>
                    <li>
                      <a
                        href="#"
                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        >Another Action</a
                      >
                    </li>
                    <li>
                      <a
                        href="#"
                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        >Something else</a
                      >
                    </li>
                  </ul>
                  <div
                    class="my-1 h-px bg-slate-150 dark:bg-navy-500"
                  ></div>
                  <ul>
                    <li>
                      <a
                        href="#"
                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        >Separated Link</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div
            class="hidden justify-between space-x-4 text-xs+ sm:flex"
            x-data="{activeTab:'tabAll'}"
          >
            <button
              @click="activeTab = 'tabRecent'"
              class="font-medium tracking-wide"
              :class="activeTab === 'tabRecent' && 'text-primary dark:text-accent-light' "
            >
              Last 7 days
            </button>
            <button
              @click="activeTab = 'tabAll'"
              class="font-medium tracking-wide"
              :class="activeTab === 'tabAll' && 'text-primary dark:text-accent-light' "
            >
              All time
            </button>
          </div>
        </div>
        <div class="ax-transparent-gridline pr-2">
          <div
            x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.serverTraffic); $el._x_chart.render() });"
          ></div>
        </div>
      </div>
      <div
        class="order-first col-span-12 grid grid-cols-2 gap-4 sm:order-none sm:gap-5 lg:col-span-5 lg:gap-6"
      >
        {{-- <div class="card row-span-2 justify-between py-5 px-2 text-center">
          <p
            class="font-medium tracking-wide text-slate-700 dark:text-navy-100"
          >
            CPU Usage
          </p>

          <div class="ax-transparent-gridline pr-1">
            <div
              x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.cpuUsage); $el._x_chart.render() });"
            ></div>
          </div>

          <p class="mt-4 text-xs+">
            Daily usage is
            <span class="font-medium text-slate-700 dark:text-navy-100"
              >Good</span
            >
          </p>
        </div> --}}
        {{-- <div class="card justify-center p-4">
          <div class="flex items-center space-x-3">
            <div>
              <div
                x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.storageUsage); $el._x_chart.render() });"
              ></div>
            </div>
            <div
              class="text-xs+ font-medium text-slate-700 dark:text-navy-100"
            >
              Storage Usage
            </div>
          </div>
        </div> --}}
        {{-- <div class="card justify-center p-4">
          <div class="flex items-center space-x-3">
            <div>
              <div
                x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.memoryUsage); $el._x_chart.render() });"
              ></div>
            </div>
            <div
              class="text-xs+ font-medium text-slate-700 dark:text-navy-100"
            >
              Memory Usage
            </div>
          </div>
        </div> --}}
        {{-- <div class="card flex-row overflow-hidden">
          <div class="h-full w-1 shrink-0 bg-primary dark:bg-accent"></div>
          <div class="p-4 font-inter">
            <div class="flex items-baseline space-x-2">
              <p
                class="text-2xl font-semibold text-slate-700 dark:text-navy-100"
              >
                4.54
              </p>
              <p class="text-xs">/12 GB</p>
            </div>
            <p class="text-xs">Daily traffic</p>
          </div>
        </div> --}}
        {{-- <div class="card flex-row overflow-hidden">
          <div class="h-full w-1 shrink-0 bg-info"></div>
          <div class="p-4 font-inter">
            <div class="flex items-baseline space-x-2">
              <p
                class="text-2xl font-semibold text-slate-700 dark:text-navy-100"
              >
                14.54
              </p>
              <p class="text-xs">/12 GB</p>
            </div>
            <p class="text-xs">Hourly traffic</p>
          </div>
        </div> --}}
      </div>
    </div>

    <div class="mt-4 sm:mt-5 lg:mt-6">
      <div class="flex items-center justify-between">
        <h2
          class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
        >
      </div>
    </div>

    <div x-data="{isFilterExpanded:false}">
        <div class="flex items-center justify-between">
          <h2
            class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100"
          >

          </h2>
          <div class="flex">
            <div class="flex items-center" x-data="{isInputActive:false}">
              <label class="block">
                <input
                  x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                  :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                  class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                  placeholder="Search here..."
                  type="text"
                />
              </label>
              <button
                @click="isInputActive = !isInputActive"
                class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-4.5 w-4.5"
                  fill="none"
                  viewbox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
              </button>
            </div>

            <button
              @click="isFilterExpanded = !isFilterExpanded"
              class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4.5 w-4.5"
                fill="none"
                viewbox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-width="2"
                  d="M18 11.5H6M21 4H3m6 15h6"
                />
              </svg>
            </button>
          </div>
        </div>
        <div x-show="isFilterExpanded" x-collapse>
          <div class="max-w-2xl py-3">
            <div
              class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6"
            >
              <label class="block">
                <span>Transaction type:</span>
                <div class="relative mt-1.5 flex">
                  <input
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Transaction Type"
                    type="text"
                  />
                  <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4.5 w-4.5 transition-colors duration-200"
                      fill="none"
                      viewbox="0 0 24 24"
                    >
                      <path
                        stroke="currentColor"
                        stroke-width="1.5"
                        d="M5 19.111c0-2.413 1.697-4.468 4.004-4.848l.208-.035a17.134 17.134 0 015.576 0l.208.035c2.307.38 4.004 2.435 4.004 4.848C19 20.154 18.181 21 17.172 21H6.828C5.818 21 5 20.154 5 19.111zM16.083 6.938c0 2.174-1.828 3.937-4.083 3.937S7.917 9.112 7.917 6.937C7.917 4.764 9.745 3 12 3s4.083 1.763 4.083 3.938z"
                      />
                    </svg>
                  </span>
                </div>
              </label>
              <label class="block">
                <span>Transaction ID:</span>
                <div class="relative mt-1.5 flex">
                  <input
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Enter Transaction ID"
                    type="text"
                  />
                  <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4.5 w-4.5 transition-colors duration-200"
                      fill="none"
                      viewbox="0 0 24 24"
                    >
                      <path
                        stroke="currentColor"
                        stroke-width="1.5"
                        d="M3.082 13.944c-.529-.95-.793-1.425-.793-1.944 0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944 0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286-.45-.26-.73-.726-1.288-1.659L4.43 16.37l-1.35-2.426z"
                      />
                      <circle
                        cx="12"
                        cy="12"
                        r="3"
                        stroke="currentColor"
                        stroke-width="1.5"
                      />
                    </svg>
                  </span>
                </div>
              </label>
              <label class="block">
                <span>From:</span>
                <div class="relative mt-1.5 flex">
                  <input
                    x-flatpickr
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Choose start date..."
                    type="text"
                  />
                  <span
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 transition-colors duration-200"
                      fill="none"
                      viewbox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                  </span>
                </div>
              </label>
              <label class="block">
                <span>To:</span>
                <div class="relative mt-1.5 flex">
                  <input
                    x-flatpickr
                    class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Choose start date..."
                    type="text"
                  />
                  <div
                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 transition-colors duration-200"
                      fill="none"
                      viewbox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="1.5"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                      />
                    </svg>
                  </div>
                </div>
              </label>
              <div class="sm:col-span-2">
                <span>Transaction Status:</span>
                <div
                  class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-5 lg:gap-6"
                >
                  <label class="inline-flex items-center space-x-2">
                    <input
                      class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-secondary checked:bg-secondary hover:border-secondary focus:border-secondary dark:border-navy-400 dark:checked:border-secondary-light dark:checked:bg-secondary-light dark:hover:border-secondary-light dark:focus:border-secondary-light"
                      type="checkbox"
                    />
                    <span>Upcoming</span>
                  </label>
                  <label class="inline-flex items-center space-x-2">
                    <input
                      class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                      type="checkbox"
                    />
                    <span>In Progress</span>
                  </label>
                  <label class="inline-flex items-center space-x-2">
                    <input
                      checked
                      class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:!border-success checked:bg-success hover:!border-success focus:!border-success dark:border-navy-400"
                      type="checkbox"
                    />
                    <span>Complete</span>
                  </label>
                  <label class="inline-flex items-center space-x-2">
                    <input
                      checked
                      class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:!border-error checked:bg-error hover:!border-error focus:!border-error dark:border-navy-400"
                      type="checkbox"
                    />
                    <span>Cancelled</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="mt-4 space-x-1 text-right">
              <button
                @click="isFilterExpanded = ! isFilterExpanded"
                class="btn font-medium text-slate-700 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25"
              >
                Cancel
              </button>

              <button
                @click="isFilterExpanded = ! isFilterExpanded"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
              >
                Apply
              </button>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
            <table class="is-hoverable w-full text-left">
              <thead>
                <tr>
                  <th
                    class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    #
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    Transaction ID
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                   Transaction Type
                  </th>

                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    Progress
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    Status
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    Transaction Date
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr
                  class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                >
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">1</td>
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                  WIT24-08-22-02
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    Withdrawal
                  </td>

                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      x-tooltip.primary="'42% Completed'"
                      class="progress h-2 bg-slate-150 dark:bg-navy-500"
                    >
                      <div
                        class="w-5/12 rounded-full bg-primary dark:bg-accent"
                      ></div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      class="badge space-x-2.5 px-0 text-primary dark:text-accent-light"
                    >
                      <div class="h-2 w-2 rounded-full bg-current"></div>
                      <span>In Progress</span>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    03 Sep
                  </td>
                </tr>
                <tr
                  class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                >
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">2</td>
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                   DEP24-08-22-01
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    Deposit
                  </td>

                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      x-tooltip.primary="'77% Completed'"
                      class="progress h-2 bg-slate-150 dark:bg-navy-500"
                    >
                      <div
                        class="w-9/12 rounded-full bg-primary dark:bg-accent"
                      ></div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      class="badge space-x-2.5 px-0 text-primary dark:text-accent-light"
                    >
                      <div class="h-2 w-2 rounded-full bg-current"></div>
                      <span>In Progress</span>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    16 Sep
                  </td>
                </tr>
                <tr
                  class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                >
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">3</td>
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                   DEP24-08-22-02
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    Deposit
                  </td>

                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      x-tooltip.error="'Cancelled'"
                      class="progress h-2 bg-slate-150 dark:bg-navy-500"
                    >
                      <div class="w-full rounded-full bg-error"></div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div class="badge space-x-2.5 px-0 text-error">
                      <div class="h-2 w-2 rounded-full bg-current"></div>
                      <span>Cancelled</span>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">N/A</td>
                </tr>
                <tr
                  class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                >
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">4</td>
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                    WIT24-08-22-01
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    Withdrawal
                  </td>

                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      x-tooltip.success="'Completed'"
                      class="progress h-2 bg-slate-150 dark:bg-navy-500"
                    >
                      <div class="w-full rounded-full bg-success"></div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div class="badge space-x-2.5 px-0 text-success">
                      <div class="h-2 w-2 rounded-full bg-current"></div>
                      <span>Completed</span>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    25 Aug
                  </td>
                </tr>
                <tr
                  class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500"
                >
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">5</td>
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                  DEP24-08-22-03
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    Deposit
                  </td>

                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      x-tooltip.secondary="'Pending'"
                      class="progress h-2 bg-slate-150 dark:bg-navy-500"
                    >
                      <div class="w-1/12 rounded-full bg-secondary"></div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      class="badge space-x-2.5 px-0 text-secondary dark:text-secondary-light"
                    >
                      <div class="h-2 w-2 rounded-full bg-current"></div>
                      <span>Pending</span>
                    </div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">3 Oct</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div
            class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5"
          >
            <div class="text-xs+">1 - 10 of 10 entries</div>
            <ol class="pagination space-x-1.5">
              <li>
                <a
                  href="#"
                  class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewbox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 19l-7-7 7-7"
                    />
                  </svg>
                </a>
              </li>
              <li>
                <a
                  href="#"
                  class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-slate-150 px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  >1</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-primary px-3 leading-tight text-white transition-colors hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >2</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-slate-150 px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  >3</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-slate-150 px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  >4</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex h-8 min-w-[2rem] items-center justify-center rounded-full bg-slate-150 px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                  >5</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-150 text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
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
                      stroke-width="2"
                      d="M9 5l7 7-7 7"
                    />
                  </svg>
                </a>
              </li>
            </ol>
          </div>
        </div>
    </div>
  </main>
@endsection