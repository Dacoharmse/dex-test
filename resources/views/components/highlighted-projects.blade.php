<div class="flex justify-center items-center px-6 py-5 pl-8">
    <!-- Highlighted Projects Title Column -->
    <div class="font-bold text-white text-base">
        Highlighted <br>Projects
    </div>

    <!-- Highlighted Projects Boxes Column -->
    <div class="highlighted-projects-wrapper flex w-full pl-20">
        <div class="highlighted-projects grid grid-cols-7 gap-10">
            @foreach($highlightedProjects->take(7) as $project)
                <div class="highlighted-item flex items-center w-[200px] h-[65px] bg-yellow-400 bg-opacity-20 rounded-lg border border-yellow-300 px-4 py-2 shadow-lg">
                    <!-- Token Logo -->
                    @if(Storage::exists($project->logo))
                        <img class="w-[50px] h-[50px] rounded-full mr-3 object-cover" src="{{ Storage::url($project->logo) }}" alt="{{ $project->title }}">
                    @else
                        <img class="w-[50px] h-[50px] rounded-full mr-3 object-cover" src="{{ asset('images/default-logo.png') }}" alt="Default Image">
                    @endif
                    <!-- Token Name and Symbol -->
                    <div class="flex flex-col justify-center w-full">
                        <!-- Token Title with link and hover for contract address -->
                        <a href="/projects/{{ $project->id }}" 
                           class="font-bold text-green-400 text-sm line-clamp-2 hover:underline" 
                           title="{{ $project->contract_address }}">
                            {{ $project->title }}
                        </a>
                        <!-- Token Symbol -->
                        <span class="text-gray-400 text-xs">{{ $project->token_symbol }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
