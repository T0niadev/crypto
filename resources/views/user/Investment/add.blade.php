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
              New Investment
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

        <form method="POST" action="{{ url('/investments/store') }}" enctype="multipart/form-data">
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
                                    <span>Take advantage of the specially curated investment packages</span>
                                </button>

                                </div>
                            </div>
                            </div>
                            <div class="tab-content p-4 sm:p-5">
                                <div class="card space-y-5 p-4 sm:p-5">
                                    <label class="block">
                                        <span class="font-medium text-slate-600 dark:text-navy-100"
                                        >Package</span
                                        >

                                        <input value="{{ $package->name }}"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder=""
                                            type="text"
                                        />
                                    </label>



                                        <input value="{{ $package->id }}" name="package_id"
                                            class=" bg-transparent px-3 py-2 text:text-transparent "
                                            placeholder=""
                                            type="hidden"
                                        />




                                    <label for="number" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >ROI</span
                                        >
                                        <input value = "{{ $package->roi }}" id="firstNumber"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Return on Investment"
                                            type="number"
                                        />
                                    </label>

                                    <label for="number" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            > Investment Amount</span
                                        >
                                        <input name="amount" id="secondNumber" onchange="multiply()"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter Investment amount of your choice"
                                            type="number"
                                        />
                                    </label>





                                    <label for="number" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >Total Interest</span
                                        >
                                        <input  id="result"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Total Interest"
                                            type="number"
                                            readonly/>
                                    </label>

                                    <label for="number" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >Total Returns</span
                                        >
                                        <input  name="total_return" id="returns"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Total Returns"
                                            type="number"
                                            readonly/>
                                    </label>



                                    <label>
                                        <span class="font-medium text-slate-600 dark:text-navy-100"
                                        >Start Date</span
                                        >
                                        <span class="relative mt-1.5 flex">
                                        <input onchange="add()"
                                            x-flatpickr
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Choose date..."
                                            type="text"
                                            id="start_date"
                                            name="start_date"
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
                                        </span>
                                    </label>
                                    <label>
                                        <span class="font-medium text-slate-600 dark:text-navy-100"
                                        >Withdrawal Date</span
                                        >
                                        <span class="relative mt-1.5 flex">
                                        <input
                                            
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Choose date..."
                                            type="text"
                                            name="withdrawal_date"
                                            id='withdrawal_date'
                                        />
                                        <input type="hidden" id="durationValue" value="{{ $package->duration }}"/>
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                                        >
                                            <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 transition-colors duration-200"
                                            fill="none"
                                            viewbox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.5"400
                                            >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                            </svg>
                                        </span>
                                        </span>
                                    </label>
                                    <div class="flex justify-center space-x-2">
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
    <script>

        function multiply()
        {
            let num1 = document.getElementById(
                "firstNumber").value;
            let num2 = document.getElementById(
                "secondNumber").value
          

             let result = document.getElementById('result').value= ((num1 * num2 )  / 100);
             console.log(result);
        }
   </script>
   <script>



    function addDate()
    {
        let durationValue = document.getElementById("durationValue").value;

        let presentDay = document.getElementById("start_date").value;
        let date = new Date(presentDay);
        addedDate = new Date(date.setDate(date.getDate() + parseInt(durationValue)));

        document.getElementById("withdrawal_date").value = addedDate.toLocaleDateString();
        
    }

    function add()
    {
        addDate();

        let num4 = document.getElementById(
            "secondNumber").value
        let num5 = document.getElementById(
            "result").value

        let result = document.getElementById('returns').value= parseInt(num4) + parseInt(num5);
        console.log(result);

    }
    </script>
@endsection
