@extends('layout.main')

@section('meta_title', 'Market Coins')
@section('meta_description', 'Explore market coins with detailed insights.')

@section('content')

<div class="min-h-screen bg-gray-900 text-white flex flex-col items-center py-8">
    <div class="w-full max-w-[90%] bg-gray-800 rounded-lg shadow-lg p-6">
        <div class="px-6 py-4 bg-gray-900 rounded-t-lg flex justify-between items-center border-b border-gray-700">
            <h1 class="text-2xl font-bold text-white">Market Coins</h1>
            <div class="flex items-center gap-4">
                <form action="{{ route('search.tokens') }}" method="GET" class="flex">
                    <input
                        type="text"
                        name="search"
                        placeholder="Search Coin Name"
                        class="bg-gray-700 text-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 w-72"
                    />
                    <button
                        type="submit"
                        class="bg-green-500 px-4 py-2 rounded-md text-white hover:bg-green-600 transition ml-2"
                    >
                        Search
                    </button>
                </form>
                <button onclick="location.href='{{ route('home.index') }}'" class="bg-gray-700 px-4 py-2 rounded-md text-white hover:bg-gray-600 transition">
                    Reset Filters
                </button>
            </div>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="w-full bg-gray-900 table-auto border-collapse rounded-b-lg" id="coinTable">
                <thead class="bg-gray-800 text-gray-400 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Coin Name</th>
                        <th class="px-6 py-3">Symbol</th>
                        <th class="px-6 py-3">Price</th>
                        <th class="px-6 py-3">24h %</th>
                        <th class="px-6 py-3">Market Cap</th>
                        <th class="px-6 py-3">Volume</th>
                        <th class="px-6 py-3">Holders</th>
                        <th class="px-6 py-3">Contract</th>
                    </tr>
                </thead>
                <tbody id="coinTableBody" class="divide-y divide-gray-700">
                    @foreach($projects as $key => $project)
                    <tr data-contract="{{ $project->contract_address }}" class="hover:bg-gray-700 transition">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 flex items-center gap-4">
                            <img
                                src="{{ $project->logo ? Storage::url($project->logo) : asset('images/default-logo.png') }}"
                                alt="{{ $project->title }}"
                                class="w-10 h-10 rounded-full shadow-md">
                            <div>
                                <p class="text-white font-semibold">{{ $project->title }}</p>
                                <p class="text-sm text-gray-400">{{ $project->token_symbol }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-300">
                            {{ $project->token_symbol }}
                        </td>
                        <td class="px-6 py-4 text-gray-300 font-medium price-cell">
                            ${{ number_format($liveData[$project->contract_address]['price'] ?? 0, 2) }}
                        </td>
                        <td class="px-6 py-4 {{ isset($liveData[$project->contract_address]['price_change_percentage']) && $liveData[$project->contract_address]['price_change_percentage'] > 0 ? 'text-green-500' : 'text-red-500' }} price-change-cell">
                            @if(isset($liveData[$project->contract_address]['price_change_percentage']))
                                {{ $liveData[$project->contract_address]['price_change_percentage'] > 0 ? '↑' : '↓' }}
                                {{ number_format($liveData[$project->contract_address]['price_change_percentage'], 2) }}%
                            @else
                                <span class="text-gray-400">N/A</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-300 market-cap-cell">
                            ${{ number_format($liveData[$project->contract_address]['market_cap'] ?? 0, 0) }}
                        </td>
                        <td class="px-6 py-4 text-gray-300 volume-cell">
                            ${{ number_format($liveData[$project->contract_address]['volume'] ?? 0, 0) }}
                        </td>
                        <td class="px-6 py-4 text-gray-300">
                            {{ $liveData[$project->contract_address]['holders'] ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4 text-gray-300">
                            <a href="https://bscscan.com/address/{{ $project->contract_address }}" target="_blank">
                                {{ substr($project->contract_address, 0, 6) }}...{{ substr($project->contract_address, -4) }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
</div>

@endsection
