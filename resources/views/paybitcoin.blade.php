

@extends('layouts.app')

@section('content')

<main class="main-content w-full px-[var(--margin-x)] pb-8">

    <div id="popup-modal" bg-white tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto ">
            <div class="relative bg-white rounded-lg ">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    
                    <span>500 USD</span>
                </button>

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
                        0.02490858
                        </span>
                        <span class="font-extralight">BTC</span>
                    </div>

                    <div class="text-xs text-center mt-2">
                        Send 0.02490858 BTC (don't include transaction fee in this amount!)
                    </div>
                   
                    <div class="p-1 text-sm font-extrabold text-center border border-gray-400 rounded mt-2">            
                        <a
                        href="12GFtXz6uL26wtd8wtRmhNJDjpy14H44kf"
                        x-data="{ tooltip: 'Open Wallet' }"
                        x-tooltip="tooltip"
                        class="text-blue-700 hover:text-blue-500"
                        >
                            12GFtXz6uL26wtd8wtRmhNJDjpy14H44kf 
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
                    <div class="text-xs text-center mt-2">
                   
                     <button data-modal-toggle="popup-modal" type="button" class="justify-center w-45 px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-600 rounded-md shadow-sm hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50">
              Deposit Form
            </h2>
        
          </div>
        </div>

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
                                    <span>Make a deposit</span>
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
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           type="text" id="bitcoinAmount" value="{{ number_format(Cryptocap::getSingleAsset('bitcoin')->data->priceUsd, 2) }}"   placeholder="Ensure you enter the same amount in the deposit form">
                                        

                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           type="text" id="USDAmount" onchange="divide()" placeholder="Enter deposit amount">

                                      
                                       
                                    </label>


                                    <label for="number" class="block mt-5">
                                        <span class="font-medium text-slate-600 dark:text-navy-100">Wallet Address</span>
                                        <input name="bank_wallet"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter Bitcoin Payment Wallet " type="text" />
                                    </label>

                                    <label for="bitcoinequivalent" class="block mt-5">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            > Bitcoin Equivalent</span
                                        >
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                           type="text" id="result"  placeholder="The equivalent deposit amount in bitcoin will appear here" readonly>
                                        
                                  

                                      
                                       
                                    </label>


                                    <div class="flex justify-center mt-3 space-x-2">
                                        <button 
                                        class="btn min-w-[7rem] bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                        data-modal-toggle="popup-modal">
                                        Pay  
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</main>
<script>

function divide()
{
    let num1 = document.getElementById(
        "bitcoinAmount").value;
    let num2 = document.getElementById(
        "USDAmount").value
  

     let result = document.getElementById('result').value= (parseInt(num1) / parseInt(num2) );
     console.log(result);
     console.log(num1, num2)
}
</script>

@endsection




