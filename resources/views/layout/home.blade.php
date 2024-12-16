@extends('layout.main')

@section('meta_title')
    {{ setting('site.meta_title') }}
@endsection
@section('meta_description')
    {{ setting('site.meta_description') }}
@endsection
@section('meta_image')
    {{ Storage::url(setting('site.meta_image')) }}
@endsection

@section('content')
    <div class="max-w-6xl px-5 mx-auto">
    <section class="py-8 max-w-7xl mx-auto text-center">
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
            <!-- First small banner ad -->
            <img src="{{ asset('/images/Token-Banner-Advert-1.jpg') }}" alt="First Banner Ad" style="width: 100%; height: auto;">
        </div>
        <div class="col-span-1">
            <!-- Second small banner ad -->
            <img src="{{ asset('/images/Token-Banner-Advert-3.jpg') }}" alt="Second Banner Ad" style="width: 100%; height: auto;">
        </div>
        <div class="col-span-1">
            <!-- Third small banner ad -->
            <img src="{{ asset('/images/Token-Banner-Advert-2.jpg') }}" alt="Third Banner Ad" style="width: 100%; height: auto;">
        </div>
    </div>
    <p class="mb-4">
        {!! setting('site.intro') !!}
    </p>
</section>




        <section class="py-8">
            <span class="block text-neutral-400 mb-4 text-sm">Token List filters</span>
            <div class="flex flex-wrap gap-2 mb-6">
                <a href="/"
                    class="btn @if (request()->segment(1) == '') btn-primary @else btn-outline-primary @endif">Latest
                    Token's</a>
                <a href="/upcoming-Tokens"
                    class="btn @if (request()->segment(1) == 'upcoming-tokens') btn-primary @else btn-outline-primary @endif">Trending
                    Tokens</a>
                <a href="/past-tokens"
                    class="btn @if (request()->segment(1) == 'past-icos') btn-primary @else btn-outline-primary @endif">Moonshot
                    Tokens</a>
            </div>

            @php
                $headers = ['', 'Token Name', 'Contract Address', 'Launch Date', '','Links',];
            @endphp

            <div class="overflow-x-auto relative sm:rounded-lg sm:border mb-5">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-gray-700 uppercase bg-gray-50 md:table-header-group hidden">
                        <tr>
                            @foreach ($headers as $header)
                                <th class="px-6 py-3">{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr
                                class="even:bg-gray-100 bg-white md:border-b border hover:bg-gray-200 md:table-row block md:p-0 p-4 ">
                                <td class="md:table-cell block py-4 px-3">
                                    <a href="{{ route('projects.show', $project->slug) }}" class="flex justify-center">
                                        <img class="w-16 rounded" src="{{ Storage::url($project->logo) }}"
                                            alt="{{ $project->title }}">
                                    </a>
                                </td>
                                <th
                                    class="md:table-cell block md:py-4 py-2 px-6 text-gray-900 whitespace-nowrap md:text-left text-center">
                                    <div class="text-lg font-semibold mb-1 hover:text-cyan-700">
                                        <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        {{-- <span class="badge badge-danger">Hot</span> --}}
                                        @if ($project->presale !== 'no')
                                            <span class="badge badge-primary">Moonshot</span>
                                        @endif
                                    </div>
                                </th>
                                <td class="md:table-cell block md:py-4 py-2 px-6 md:text-left text-center">
                                    {{ $project->description }}
                                </td>
                                <td class="md:table-cell block md:py-4 py-2 px-6 md:text-left text-center">
                                    {{ date('M d, Y', strtotime($project->start_date)) }}
                                </td>
                                <td class="md:table-cell block md:py-4 py-2 px-6 md:text-left text-center">
                                    @if (!$project->end_date)
                                        TBD
                                    @else
                                        {{ date('M d, Y', strtotime($project->end_date)) }}
                                    @endif
                                </td>
                                <td class="md:table-cell block py-4 px-6">
                                    <x-social-links class="justify-center" :links="$project->links"></x-social-links>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $projects->links() }}
        </section>
    </div>
@endsection
