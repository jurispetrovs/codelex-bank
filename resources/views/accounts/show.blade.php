<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl text-center">
                            Account Details
                        </div>
                        <div class="mt-6 text-gray-500">

                            <form method="post" action="{{ route('accounts.store') }}" class="w-full mx-auto max-w-3xl bg-white p-8 text-gray-700 ">
                            <!-- holder field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <p class="text-xl">Holder</p>
                                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="name" type="text" value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" disabled>
                                        <label for="name" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Name
                                        </label>
                                    </div>
                                </div>
                                <!-- account field -->
                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <p class="text-xl">Account</p>
                                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="account" type="text" value="{{ $account->number }}" disabled>
                                        <label for="account" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Account
                                        </label>
                                    </div>
                                </div>

                                <div class="flex flex-wrap mb-6">
                                    <div class="relative w-full appearance-none label-floating">
                                        <p class="text-xl">Available balance</p>
                                        <input class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                               id="balance" type="text" value="{{ $account->getBalance() }} {{ $account->currency }}" disabled>
                                        <label for="balance" class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text">
                                            Available balance
                                        </label>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl text-center">
                            Transaction history
                        </div>
                        <div class="mt-6 text-gray-500">
                            <table class="min-w-full">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Date</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Recipient / Payer</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Description</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Amount</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">

                                @foreach($account->transactions() as $transaction)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm leading-5 text-blue-900">{{ $transaction->created_at }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $account->debitTransactions->contains($transaction) ? $transaction->toAccountHolder()->first()->getNameAndSurname() : $transaction->fromAccountHolder()->first()->getNameAndSurname() }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $transaction->description }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b text-{{ $account->debitTransactions->contains($transaction) ? 'green' : 'red' }}-900 font-bold border-gray-500 text-sm leading-5">{{ $account->debitTransactions->contains($transaction) ? '+' : '-' }}{{ $transaction->getAmount() }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl text-center">
                            Delete Account
                        </div>
                        <div class="mt-6 text-gray-500">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
