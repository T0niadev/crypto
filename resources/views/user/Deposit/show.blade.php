
@extends('layouts.app')

@section('content')
  <!-- Main Content Wrapper -->
  <main class="main-content w-full px-[var(--margin-x)] pb-8">
  
  <div id="popup-modal" bg-white tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto ">
            <div class="relative bg-white rounded-lg ">
               
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close</span>
                    
                </button>
                <div class="p-6 text-center">
                  <span>you are about to pay {{ $deposit['amount'] }} USD</span>
                </div>
                <div class="p-6 text-center">
                    
                    
                    
                   
                    <div class="relative mt-4">
                        <img
                            class="h-full w-full rounded-lg object-cover object-center"
                            src="{{ asset('assets/images/g.png' ) }}"
                            alt="wallet"
                        />
                      
                    </div>


                   
               
                    <div class="text-2xl mt-2 mb-2 font-extrabold text-center">
                        <span
                        x-data="{ tooltip: 'Copy Amount' }"
                        x-tooltip="tooltip"
                        x-on:click="$clipboard(amount); tooltip = 'Copied!'"
                        class="cursor-pointer"
                        >
                        {{ $deposit['bitcoin_amount'] }} 
                        </span>
                        <span class="font-extralight">BTC</span>
                    </div>

                    <div class="text-xs text-center mt-2">
                        Send {{ $deposit['bitcoin_amount'] }} BTC (don't include transaction fee in this amount!)
                    </div>
                   
                    <div class="p-1 text-sm font-extrabold text-center border border-gray-400 rounded mt-2">            
                        <a
                        href="12GFtXz6uL26wtd8wtRmhNJDjpy14H44kf"
                        x-data="{ tooltip: 'Open Wallet' }"
                        x-tooltip="tooltip"
                        class="text-blue-700 hover:text-blue-500"
                        >
                           3Mr2DCsEXQK3X1Nz9xMdAcq1Ak7Tgq48M8 
                        </a>
                                    
                        <i
                        class="ml-3 cursor-pointer far fa-copy"
                        x-data="{ tooltip: 'Copy Address' }"
                        x-tooltip="tooltip"
                        x-on:click="$clipboard(walletAddress); tooltip = 'Copied!'"
                        ></i>
    
                        <a href="12GFtXz6uL26wtd8wtRmhNJDjpy14H44kf">
                        <i
                            class="ml-3 cursor-pointer fas fa-external-link-alt"
                            x-data="{ tooltip: 'It will open your Bitcoin wallet with address and sum which you need to send \\nand you will need to simply click Send button in wallet only. If your browser does not recognise the Bitcoin link, simply use \&quot;Copy Address\&quot; button below and manually copy address and the amount to pay in your Bitcoin wallet.' }"
                            x-tooltip="tooltip"                
                        ></i>
                        </a>
                    </div>

                    <div class="col-span-12 space-y-2 sm:col-span-12 mt-2">
                        <div class="mt-0">
                            <button 
                            type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-600 rounded-md shadow-sm hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                            <i class="mr-2 fas fa-spinner fa-pulse"></i>
                            Awaiting Payment From You
                            </button>
                        </div>         
                        <div class="text-sm text-center my-2">
                            If you send any other bitcoin amount, payment system will ignore it!
                        </div> 
                    </div>
                    <form action="{{ url('/update/status', $deposit->id) }}" method="POST" >
                      {{ csrf_field() }}
                        <div class="text-xs text-center mt-2">
                    
                        <button name="status" value="processing" type="submit" class="justify-center w-45 px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-600 rounded-md shadow-sm hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Click here if payment has been made</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="mt-4 sm:mt-5 lg:mt-6">
      <div class="flex items-center justify-between">
        <h3
          class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 mb-4" 
        >
          Kindly confirm deposit amount and payment wallet before making payment
       </h3>
      </div>
    </div>

    <div x-data="{isFilterExpanded:false}">
        
          
          <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
            <table class="is-hoverable w-full text-left">
              <thead>
                <tr>
               
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                   Deposit Amount
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >BTC Amount
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                   Bitcoin Payment Wallet
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    Status
                  </th>
                  <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5"
                  >
                    Action
                  </th>
                </tr>
              </thead>
            
              <tbody>
                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">

                 
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                   ${{ $deposit['amount'] }}
                  </td>

                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                   {{ $deposit['bitcoin_amount'] }} BTC
                  </td>
               
                  <td
                    class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5"
                  >
                   {{ $deposit['wallet'] }}
                  </td>
                  

                  <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                    <div
                      class="badge space-x-2.5 px-0 text-primary dark:text-accent-light"
                    >
                      <div class="h-2 w-2 rounded-full bg-current"></div>
                      <span>{{ $deposit['status'] }}</span>
                    </div>
                  </td>
                  <td>
                    <div class="mt-3 space-x-2">
                            <button 
                            class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                            data-modal-toggle="popup-modal" data-targe="#popup-modal{{$deposit->id}}">
                            Proceed with Payment
                            </button>
                    </div>
                    

                    <!-- <a  class=""  href="{{ url('/deposit/edit', $deposit->id) }}">
                        <i class="fa-solid fa-pen-to-square" class=""></i>
                        <span class="ps-1">Edit</span>
                    </a> -->

                  </td>
                </div>
                </tr>
                
               
          
                
                
              </tbody>
            </table>
          </div>

         
        </div>
    </div>
  </main>
@endsection
