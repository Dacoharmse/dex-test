@foreach ($projects as $project)
<tr class="border-b bg-white">
    <!-- Token Icon with Currency Icon Overlay -->
    <td class="py-4 px-6 align-middle text-center">
        <a href="{{ route('projects.show', $project->slug) }}" class="relative">
            <img class="rounded-full w-16 h-16 md:w-20 md:h-20 mx-auto" src="{{ Storage::url($project->logo) }}" alt="{{ $project->title }}">
            @if(isset($currencyIcons[$project->token_sale_hard_cap_currency]))
                <img src="{{ asset('images/' . $currencyIcons[$project->token_sale_hard_cap_currency]) }}" alt="{{ $project->token_sale_hard_cap_currency }}" class="w-5 h-5 absolute bottom-0 right-0 transform translate-x-1/4 translate-y-1/4">
            @endif
        </a>
    </td>
    
    <!-- Token Name and Badge -->
    <th class="py-4 px-6 align-middle text-center">
        <div class="text-lg font-semibold mb-1">
            <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
        </div>
        <div class="flex items-center justify-center gap-1">
            @if (strtolower($project->presale) === 'presale')
                <span class="badge" style="background-color: blue; color: white;">Presale</span>
            @elseif (strtolower($project->presale) === 'pump.fun')
                <span class="badge" style="background-color: white; color: green;">Pump.Fun</span>
            @elseif (strtolower($project->presale) === 'ape.store')
                <span class="badge" style="background-color: yellow; color: black;">Ape.Store</span>
            @elseif (strtolower($project->presale) === 'moonshot')
                <span class="badge" style="background-color: black; color: yellow; border: 1px solid yellow;">Moonshot</span>
            @elseif (strtolower($project->presale) === 'sun.pump')
                <span class="badge" style="background-color: orange; color: white;">Sun.Pump</span>
            @endif
        </div>
    </th>
    
    <!-- Top Badge -->
    <td class="py-4 px-6 align-middle text-center">
        @if ($project->promoted)
            <img src="{{ asset('images/top.png') }}" alt="Promoted" class="top-image mx-auto">
        @else
            —
        @endif
    </td>

    <!-- Contract Address -->
    <td class="py-4 px-6 align-middle text-center">
        {{ $project->contract_address }}
    </td>
    
    <!-- Exchange Icons -->
    <td class="py-4 px-6 align-middle text-center">
        <div class="flex justify-center gap-2">
            @foreach([$project->exchange_listing_1, $project->exchange_listing_2] as $exchange)
                @if($exchange && isset($exchangeData[$exchange]))
                    <a href="{{ $exchangeData[$exchange]['url'] }}" target="_blank">
                        <img src="{{ asset('images/' . $exchangeData[$exchange]['icon']) }}" alt="{{ $exchange }}" class="w-8 h-8 mx-1">
                    </a>
                @endif
            @endforeach
        </div>
    </td>
    
    <!-- Boost Button -->
    <td class="py-4 px-6 align-middle text-center">
        <button class="vote-button" data-project-id="{{ $project->id }}">
            <span class="icon">🚀</span>
            <span class="text">Boost</span>
            <span class="vote-count" id="voteCount{{ $project->id }}">{{ $project->boosts }}</span>
        </button>
    </td>
    
    <!-- Launched Date -->
    <td class="py-4 px-6 align-middle text-center text-xs">
        {{ date('M d, Y', strtotime($project->start_date)) }}
    </td>
    
    <!-- Social Links -->
    <td class="py-4 px-6 align-middle text-center">
        <div class="flex justify-center gap-2">
            <x-social-links class="justify-center" :links="$project->links"></x-social-links>
        </div>
    </td>
</tr>
@endforeach
