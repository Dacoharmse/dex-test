@extends('layout.main')
@section('meta_title')
    {{ $page->title }}
@endsection
@section('meta_description')
    {{ $page->meta_description }}
@endsection
@section('meta_image')
    {{ Storage::url(setting('site.meta_image')) }}
@endsection

@section('content')
    <div class="max-w-6xl px-5 mx-auto">
        <section class="py-8 max-w-3xl mx-auto">
            <h1 class="mb-6 text-center font-bold text-2xl sm:text-4xl">
                {{ $page->title }}
            </h1>

            <div class="prose lg:prose-xl">
                {!! $page->body !!}
            </div>
        </section>
    </div>
@endsection
