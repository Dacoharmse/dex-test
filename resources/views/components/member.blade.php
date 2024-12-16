<div class="w-48">
    <div class="relative w-fit mb-5">
        <img src="{{ $member->photo ? Storage::url($member->photo) : asset('images/avatar.png') }}"
            alt="{{ $member->full_name }}" class=" rounded-full  h-36 w-36 object-cover ">
        @if ($member->linkedin)
            <div class="absolute bottom-0 right-0 p-2">
                <a href="{{ $member->linkedin }}" target="_blank"
                    class="flex items-center justify-center rounded-full bg-blue-600 w-8 h-8 hover:bg-blue-900">
                    <i class="fa-brands fa-linkedin text-white" style="margin: 0; line-height: 2rem;"></i>
                </a>
            </div>
        @endif
    </div>
    <p class="text-base">{{ $member->full_name }}</p>
    <p class="text-base text-gray-500">{{ $member->job_title }}</p>
</div>
