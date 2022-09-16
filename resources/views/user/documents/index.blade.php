@extends('layouts.app')

@section('content')

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      
        

        <div  class="pt-5 text-base font-medium tracking-wide text-primary dark:text-accent-light">
            Kindly upload both the front and back page of your identification document e.g Valid Passport, National Identification Card
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
        <form action="{{url('/submit/document')}}" method="post">
            @csrf
            <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
        
            <div class="col-span-12 lg:col-span-8">
                <div class="card">
                
                <div
                    class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5"
                >

                    
                    <h2
                    class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100"
                    >
                    Document Upload
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
                
                                
                                                
                                            
                                                
                                                
                                                    
                                                
                            
                                    
                                
                <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                    <img
                    class="w-14"
                    src="{{ asset('assets/images/folders/folder-warning.svg') }}"

                    alt="folder"
                    />
                   
                 
                </div>
                                
                            
        
                <div class="tab-content p-4 sm:p-5">
                    <div class="card space-y-5 p-4 sm:p-5">
                      



                        <label for="number" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >Document Type</span
                                        >
                                        <input  
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Enter Document Type"
                                            type="text"
                                            name="document_type"
                                        />
                        </label>


                        <label for="image" class="block">
                                        <span
                                            class="font-medium text-slate-600 dark:text-navy-100"
                                            >Attachment</span
                                        >
                                        <input  
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Attach Document Here"
                                            type="file"
                                            name="image"
                                        />
                        </label>
                    
                    </div>
                </div>
                
            </div>
            </div>
        </form>
    </main>
@endsection
