<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl text-center">
                            Accounts
                        </div>
                        <div class="mt-6 text-gray-500">
                            <table class="min-w-full">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Account</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Currency</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Available balance</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach(Auth::user()->accounts as $account)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm leading-5 text-blue-900">{{ $account->number }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $account->currency }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $account->getBalance() }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                            <a href="{{ route('accounts.show', $account) }}" class="button-2">
                                                View Details
                                            </a>
                                        </td>
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
                            Recent transactions
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

                                @foreach($transactions as $transaction)
                                    @if($transaction->recipient_id === Auth::user()->id)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm leading-5 text-blue-900">{{ $transaction->created_at }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $transaction->fromAccountHolder()->first()->getNameAndSurname() }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $transaction->description }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b text-green-900 font-bold border-gray-500 text-sm leading-5">+{{ $transaction->getAmount() }}</td>
                                        </tr>
                                    @endif

                                    @if($transaction->sender_id === Auth::user()->id)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm leading-5 text-blue-900">{{ $transaction->created_at }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $transaction->toAccountHolder()->first()->getNameAndSurname() }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $transaction->description }}</td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b text-red-900 font-bold border-gray-500 text-sm leading-5">-{{ $transaction->getAmount() }}</td>
                                        </tr>
                                    @endif

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
