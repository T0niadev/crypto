@extends('layouts.app')

@section('content')

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
        >
            My Files
        </h2>
        <div>

            <div  class="pt-5 text-base font-medium tracking-wide text-primary dark:text-accent-light">
                Collection
            </div>
            <div class="mt-1.5 flex items-center justify-between">
                <p class="text-salte-400 text-xs+ dark:text-navy-300">
                22 files
                </p>
                <p class="font-medium text-slate-600 dark:text-navy-100">
                455 MB
                </p>
            </div>
        </div>
        <div class="card swiper-slide w-56 shrink-0 p-3 pt-4">
            <div class="flex items-center justify-between">
                <img
                class="w-14"
                src="{{ asset('assets/images/folders/folder-warning.svg') }}"

                alt="folder"
                />
                <button
                class="btn -mr-2 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewbox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                    />
                </svg>
                </button>
            </div>
            <div
              class="pt-5 text-base font-medium tracking-wide text-warning"
            >
              View Previously Uploaded Documents
            </div>
            <div class="mt-1.5 flex items-center justify-between">
              <p class="text-salte-400 text-xs+ dark:text-navy-300">
                2 files
              </p>
              <p class="font-medium text-slate-600 dark:text-navy-100">

              </p>
            </div>
        </div>


        <div  class="pt-5 text-base font-medium tracking-wide text-primary dark:text-accent-light">
            Kindly upload both the front and back page of your identification document e.g Valid Passport, National Identification Card
        </div>


        <form action="/action_page.php">
          <label for="myfile">Select a file:</label>
          <input type="file" id="myfile" name="myfile"><br><br>
          <button
                class="btn -mr-1 h-20 w-20 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-light-300/20 dark:focus:bg-warning-300/20 dark:active:bg-navy-300/25"
                >Submit</button>
        </form>
    </main>
@endsection
