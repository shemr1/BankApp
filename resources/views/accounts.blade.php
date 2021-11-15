@extends('layouts.app')


@section('content')
    
<div class="w-full flex items-center justify-center">

    <div class="mr-4 xl:w-1/4 sm:w-1/2 w-full 2xl:w-1/5 flex flex-col items-center py-16 md:py-12 bg-gradient-to-r from-indigo-700 to-purple-500 rounded-lg">
        <div class="w-full flex items-center justify-center">
            <div class="flex flex-col items-center">
                <img src="https://cdn.tuk.dev/assets/templates/olympus/profile.png" alt="profile" />
                <p class="mt-2 text-xs sm:text-sm md:text-base font-semibold text-center text-white">Savings</p>
            </div>
        </div>
        <div class="flex items-center mt-7">
            <div class="">
                <p class="text-xs text-gray-300">Loans</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">0</p>
            </div>
            <div class="ml-12">
                <p class="text-xs text-gray-300">Balance</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">${{ DB::table('sav_accs')->where('user_id', auth()->user()->id)->value('balance') }}</p>
            </div>
            <div class="ml-12">
                <p class="text-xs text-gray-300">Interest Rate</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">$0.5</p>
            </div>
        </div>
    </div>

    <div class="mr-4 xl:w-1/4 sm:w-1/2 w-full 2xl:w-1/5 flex flex-col items-center py-16 md:py-12 bg-gradient-to-r from-indigo-700 to-purple-500 rounded-lg">
        <div class="w-full flex items-center justify-center">
            <div class="flex flex-col items-center">
                <img src="https://cdn.tuk.dev/assets/templates/olympus/profile.png" alt="profile" />
                <p class="mt-2 text-xs sm:text-sm md:text-base font-semibold text-center text-white">Chequing</p>
            </div>
        </div>
        <div class="flex items-center mt-7">
            <div class="">
                <p class="text-xs text-gray-300">Loans</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">28</p>
            </div>
            <div class="ml-12">
                <p class="text-xs text-gray-300">Balance</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">${{ DB::table('chq_accs')->where('user_id', auth()->user()->id)->value('balance') }}</p>
            </div>
            <div class="ml-12">
                <p class="text-xs text-gray-300">Daily Limit</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">$10000</p>
            </div>
        </div>
    </div>

    <div class="xl:w-1/4 sm:w-1/2 w-full 2xl:w-1/5 flex flex-col items-center py-16 md:py-12 bg-gradient-to-r from-indigo-700 to-purple-500 rounded-lg">
        <div class="w-full flex items-center justify-center">
            <div class="flex flex-col items-center">
                <img src="https://cdn.tuk.dev/assets/templates/olympus/profile.png" alt="profile" />
                <p class="mt-2 text-xs sm:text-sm md:text-base font-semibold text-center text-white">Investment</p>
            </div>
        </div>
        <div class="flex items-center mt-7">
            <div class="">
                <p class="text-xs text-gray-300">Loans</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">28</p>
            </div>
            <div class="ml-12">
                <p class="text-xs text-gray-300">Balance</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">${{ DB::table('inv_accs')->where('user_id', auth()->user()->id)->value('balance') }}</p>
            </div>
            <div class="ml-12">
                <p class="text-xs text-gray-300">Rate</p>
                <p class="mt-2 text-base sm:text-lg md:text-xl 2xl:text-2xl text-gray-50">%5</p>
            </div>
        </div>
    </div>
</div>






@endsection