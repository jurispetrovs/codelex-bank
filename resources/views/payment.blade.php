<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl text-center">
                            New payment
                        </div>
                        <div class="mt-6 text-gray-500">
                            <form method="post" action="{{ route('transactions.store') }}" id="contact-me" class="w-full mx-auto max-w-3xl bg-white p-8 text-gray-700 ">
                            @csrf
                                <!-- name field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="name" type="text" value=" {{ Auth::user()->getNameAndSurname() }}" disabled>
                                        <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Name
                                        </label>
                                    </div>
                                </div>
                                <!-- account field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <select class="@error('sender') border-red-500 @enderror tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="account" name="sender">
                                            <option value="" disabled selected>Choose an account</option>
                                            @foreach(Auth::user()->accounts as $account)
                                                <option value="{{ $account->number }}" {{ (old("sender") == $account->number ? "selected":"") }}>[{{ $account->currency }}] {{ $account->number }} | Balance: {{ $account->getBalance() }}</option>
                                            @endforeach
                                        </select>
                                        <label for="account" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Account
                                        </label>
                                        @error('sender')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                Select account
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- recipient account field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <input class="@error('recipient') border-red-500 @enderror tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="recipient" name="recipient" type="text" placeholder="Recipient account" value="{{ old('recipient') }}">
                                        <label for="recipient" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Recipient account
                                        </label>
                                        @error('recipient')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                Wrong recipient account
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- amount field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <input class="@error('amount') border-red-500 @enderror tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="amount" name="amount" type="text" placeholder="Amount" value="{{ old('amount') }}">
                                        <label for="amount" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Amount
                                        </label>
                                        @error('amount')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                Wrong amount
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <input class="@error('description') border-red-500 @enderror tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="description" name="description" type="text" placeholder="Description" value="{{ old('description') }}">
                                        <label for="description" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Description
                                        </label>
                                        @error('description')
                                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                Fill in the description
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="">
                                    <button class="w-full shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                        Confirm
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
