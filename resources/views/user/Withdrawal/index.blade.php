

@extends('layouts.app')

@section('content')




    <main class="main-content w-full px-[var(--margin-x)] pb-8">



        <div
          class="flex flex-col items-center justify-between space-y-4 py-5 sm:flex-row sm:space-y-0 lg:py-6"
        >
          <div class="flex items-center space-x-1">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewbox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
              />
            </svg>
            <h2
              class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50"
            >
              Withdrawal
            </h2>
          </div>
        </div>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        <form method="POST" action="{{ url('/withdrawal/store') }}" enctype="multipart/form-data">
          @csrf
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="card">
                        <div class="tabs flex flex-col">
                            <div class="is-scrollbar-hidden overflow-x-auto">
                            <div class="border-b-2 border-slate-150 dark:border-navy-500">
                                <div class="tabs-list -mb-0.5 flex">
                                <button
                                    class="btn h-14 shrink-0 space-x-2 rounded-none border-b-2 border-primary px-4 font-medium text-primary dark:border-accent dark:text-accent-light sm:px-5"
                                >
                                    <i class="fa-solid fa-layer-group text-base"></i>
                                    <span>Enter your withdrawal details here</span>
                                </button>

                                </div>
                            </div>
                            </div>
                            <div class="tab-content p-4 sm:p-5">



                                    <label for="amount" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            > Amount ($)</span
                                        >
                                        <input name="amount"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter here"
                                            type="number"

                                        />
                                    </label>


                                    <label for="number" class="block mt-3">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            > Bank Name or Currency Type</span
                                        >
                                        <input name="bankname_currency"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter here"
                                            type="text"

                                        />
                                    </label>

                                    <label for="number" class="block mt-3">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >Account Name or Wallet ID</span
                                        >
                                        <input name="accountname_ID"
                                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter here"
                                            type="text"
                                        />
                                    </label>



                                    <label for="number" class="block mt-3">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >Account Number or Wallet</span
                                        >
                                        <input name="bank_wallet"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter here"
                                            type="text"
                                        />
                                    </label>




                                    <div class="flex justify-center mt-3 space-x-2">
                                        <button type="submit"
                                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                        >
                                        Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </main>

@endsection




