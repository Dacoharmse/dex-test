<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BannerDetailsMail;

class BannerController extends Controller
{
    public function sendEmail(Request $request)
    {
        Log::info('sendEmail method called.');

        $validatedData = $request->validate([
            'banner' => 'required|image|max:5242880', // 5MB
            'target_url' => 'required|url',
            'duration' => 'required',
            'currency' => 'required',
        ]);

        Log::info('Validation passed.', $validatedData);

        try {
            $path = $request->file('banner')->store('banners', 'public');
            Log::info('Banner uploaded to: ' . $path);

            $details = [
                'target_url' => $request->target_url,
                'duration' => $request->duration,
                'currency' => $request->currency,
                'banner_path' => storage_path('app/public/' . $path),
            ];

            Log::info('Sending email with details:', $details);

            Mail::to('support@dex-tokens.io')->send(new BannerDetailsMail($details));

            Log::info('Email sent successfully.');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error sending email: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Failed to send email.'], 500);
        }
    }
}
