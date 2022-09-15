@extends('layouts.app')

@section('content')

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
        <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
        >
            Profile
        </h2>
        <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
        </div>
        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
            <a
                class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="#"
                >Settings</a
            >
            <svg
                x-ignore
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
            </li>
            <li>Edit Profile</li>
        </ul>
        </div>
        @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                <form action="{{url('/edit/profile')}}" method="post">
                    @csrf
                    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
                    <div class="col-span-12 lg:col-span-4">
                        <div class="card p-4 sm:p-5">
                        <div class="flex items-center space-x-4">
                            <div class="avatar h-14 w-14">
                            <img
                                class="rounded-full"
                                src="{{ asset('assets/images/avatar/avatar.png' ) }}"
                                alt="avatar"
                            />
                            </div>
                            <div>
                            <h3
                                class="text-base font-medium text-slate-700 dark:text-navy-100"
                            >
                            {{auth()->user()->username}}
                            </h3>
                            <p class="text-xs+">User</p>
                            </div>
                        </div>
                    
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-8">
                        <div class="card">
                        <div
                            class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
                        >
                            <h2
                            class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                            >
                            Account Setting
                            </h2>
                            <div class="flex justify-center space-x-2">
                            <button
                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
                            >
                                Cancel
                            </button>
                            <button
                             type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            >
                                Save
                            </button>
                            </div>
                        </div>
                        <div class="p-4 sm:p-5">
                            <div class="flex flex-col">
                            <span
                                class="text-base font-medium text-slate-600 dark:text-navy-100"
                                >{{auth()->user()->first_name}} {{auth()->user()->last_name}}</span
                            >
                            <div class="avatar mt-1.5 h-20 w-20">
                                <img
                                class="mask is-squircle"
                                src="{{ asset('assets/images/avatar/avatar.png' ) }}"
                                alt="avatar"
                                />
                                <div
                                class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700"
                                >
                                <button
                                    class="btn h-6 w-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                >
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-3.5 w-3.5"
                                    viewbox="0 0 20 20"
                                    fill="currentColor"
                                    >
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    />
                                    </svg>
                                </button>
                                </div>
                            </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div><br />
                                @endif
                            <form action="{{url('profile.info')}}" method="post">
                                @csrf
                            
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <label class="block">
                                        <span>First Name </span>
                                        <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="{{auth()->user()->first_name}}"
                                            type="text"
                                            name="first_name"
                                        />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                        >
                                            <i class="fa-regular fa-user text-base"></i>
                                        </span>
                                        </span>
                                    </label>
                                    <label class="block">
                                        <span>Last Name </span>
                                        <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="{{auth()->user()->last_name}}"
                                            type="text"
                                            name="last_name"
                                        />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                        >
                                            <i class="fa-regular fa-user text-base"></i>
                                        </span>
                                        </span>
                                    </label>
                                    <label class="block">
                                        <span>Email Address </span>
                                        <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="{{auth()->user()->email}}"
                                            type="text"
                                            name="email"
                                        />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                        >
                                            <i class="fa-regular fa-envelope text-base"></i>
                                        </span>
                                        </span>
                                    </label>
                                    <label class="block">
                                        <span>Phone Number</span>
                                        <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="{{auth()->user()->phone}}"
                                            type="text"
                                            name="phone"
                                        />
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                        >
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        </span>
                                    </label>

                                    <div>
                                        <span>Change Password</span>
                                        <label class="block">
                                        <input
                                            class="form-input w-full rounded-lg border border-success bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                            placeholder="Enter Password"
                                            type="password" name="password"
                                        />
                                        </label>
                                        <span class="text-tiny+ text-success"></span>

                                        </div>
                                        <span></span>
                                        <div>
                                        <label class="block">
                                            <input
                                            class="form-input w-full rounded-lg border border-success bg-transparent px-3 py-2 placeholder:text-slate-400/70"
                                            placeholder="Confirm Password"
                                            type="text"
                                            value=""
                                            />
                                        </label>
                                        <span class="text-tiny+ text-success"></span>
                                    </div>
                                <div>
                            

                                </div>
                                </div>
                        
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
  </main>
@endsection
