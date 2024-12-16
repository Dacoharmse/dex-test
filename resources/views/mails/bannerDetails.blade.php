@extends('layout.mail')

@section('title')
    Banner Advertisement Details
@endsection

@section('main_title')
    Banner Advertisement Details
@endsection

@section('description')
    Here are the details of your banner advertisement submission:
@endsection

@section('content')
    <p><strong>Target URL:</strong> {{ $details['target_url'] }}</p>
    <p><strong>Duration:</strong> {{ $details['duration'] }} Days</p>
    <p><strong>Currency:</strong> {{ $details['currency'] }}</p>
    <p><strong>Banner Image:</strong></p>
    <img src="{{ $message->embed($details['banner_path']) }}" alt="Banner Image" style="display:block;margin:20px auto;max-width:100%;border-radius:8px;">
@endsection
