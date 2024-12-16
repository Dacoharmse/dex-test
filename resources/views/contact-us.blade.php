@extends('layout.main')

@section('meta_title')
    Contact Us
@endsection

@push('head')
    <link rel="stylesheet" href="{{ asset('intl-tel/css/intlTelInput.min.css') }}">
@endpush

@section('content')
    <div class="max-w-6xl px-5 mx-auto">
        <section class="py-8">
            <h1 class="mb-6 mt-6 text-3xl">Contact Us</h1>
            <form action="{{ route('contact.send') }}" method="POST">
                {{ csrf_field() }}
                <div class="-mx-4">
                    <x-validation-alert />
                    <div class="form-group">
                        <label for="full_name" class=" required">Full name</label>
                        <input class="form-control" type="text" id="full_name" name="full_name" required
                            value="{{ old('full_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class=" required">Email</label>
                        <input class="form-control" type="email" id="email" name="email" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="required">Phone Number</label>
                        <input class="form-control" type="tel" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}" required>
                        <input id="country_code" type="hidden" name="country_code" />
                    </div>
                    <div class="form-group">
                        <label for="subject" class=" required">Subject</label>
                        <select class="form-control" id="subject" name="subject" required>
                            @foreach (['General' => 'General', 'Technical' => 'Technical', 'Marketing' => 'Marketing', 'Other' => 'Other'] as $item)
                                <option value="{{ $item }}" {{ old('subject') == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message" class="">Message</label>
                        <textarea class="form-control" rows="6" name="message">{{ old('message') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('intl-tel/js/intlTelInput.min.js') }}"></script>
    <script>
        const token = @json(env('IP_INFO_TOKEN'));
        const input = document.querySelector("#phone_number");

        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: async function(success, failure) {
                try {
                    const response = await fetch("https://ipinfo.io/?token=" + token, {
                        headers: {
                            "Accept": "application/json"
                        }
                    })
                    const data = await response.json()
                    var countryCode = (data && data.country) ? data.country : "us";
                    success(countryCode);
                } catch (error) {
                    failure();
                }
            },
        });
        input.addEventListener("countrychange", function() {
            document.getElementById('country_code').value = iti.getSelectedCountryData().dialCode;
        });
    </script>
@endpush
