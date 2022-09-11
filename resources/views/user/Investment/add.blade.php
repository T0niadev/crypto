@extends('layouts.app')

@section('content')


    <main class="main-content w-full px-[var(--margin-x)] pb-8">

        <div class="app-content content ">
                <h3
                class="text-xl font-medium text-slate-800 dark:text-navy-50"
            >
                ADD INVESTMENT
            </h3>

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
                <div class="mb-12">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Package Name</label>

                    <select name="package_id" id="package_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <option value="" selected disabled>Chose a Package</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">
                                    {{ $package->name }}
                                </option>
                            @endforeach
                        </select>

                </div>

                <div class="mb-6">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Amount</label>
                    <input type="percentage" name="amount"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div class="mb-6">
                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Total
                        Return</label>
                    <input type="number" name="total_return"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div class="mb-6">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Start
                        Date</label>
                    <input type="date" name="start_date"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div class="mb-6">
                    <label for="date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Withdrawal Date</label>
                    <input type="date" name="withdrawal_date"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>

                <div class="mb-6">
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Slots</label>
                    <input type="number" name="slots"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>



                <button type="submit" href="/admin/packages/store"><i class="fa fa-p class="text-white bg-blue-700
                        hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm
                        px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">Submit</button>
            </form>
        <div>
    </main>
@endsection

