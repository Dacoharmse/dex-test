<div {{ $attributes->merge(['class' => 'flex flex-wrap gap-2']) }}>
    @foreach ($links as $key => $link)
        @if ($link)
            <a href="{{ $link }}" target="_blank" class="flex items-center justify-center rounded-full text-green-500 transition-all duration-300" style="font-size: 1.5rem;">
                <i class="fa-brands fa-{{ $key }}"></i>
            </a>
        @endif
    @endforeach
</div>

<style>
    .fa-brands {
        transition: text-shadow 0.3s ease, color 0.3s ease;
    }

    .fa-brands:hover {
        color: #16c784 !important; /* Green color */
        text-shadow: 0 0 5px rgba(22, 199, 132, 0.6); /* Glowing effect */
    }
</style>

