@extends('layout.mail')

@section('title')
    {{ $data['subject'] }}
@endsection

@section('description')
    From: {{ $data['full_name'] }}, {{ $data['email'] }}
    <br />
    {{ $data['message'] }}
    <br />

    Phone number: {{ $data['phone_number'] }}
@endsection
