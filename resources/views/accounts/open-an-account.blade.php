<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Open an account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl text-center">
                            Open an account
                        </div>
                        <div class="mt-6 text-gray-500">
                            <form method="post" action="{{ route('accounts.store') }}" class="w-full mx-auto max-w-3xl bg-white p-8 text-gray-700 ">
                            @csrf
                                <!-- name field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="name" type="text" value="{{ Auth::user()->getNameAndSurname()}}" disabled>
                                        <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Name
                                        </label>
                                    </div>
                                </div>
                                <!-- email field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="email" type="text" value="{{ Auth::user()->email }}" disabled>
                                        <label for="email" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Email
                                        </label>
                                    </div>
                                </div>
                                <!-- currency field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <select class="@error('currency') border-red-500 @enderror tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="currency" name="currency">
                                            <option value="" disabled selected>Choose an currency</option>
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="GBP">GBP</option>
                                            <option value="RUB">RUB</option>
                                            <option value="AUD">AUD</option>
                                        </select>
                                        <label for="currency" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Currency
                                        </label>
                                        @error('currency')
                                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                                Select currency
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="">
                                    <button class="w-full shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                            type="submit">
                                        Open
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
