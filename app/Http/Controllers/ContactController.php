<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Rules\ReCaptchaV3;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:500',
            'message' => 'required|string|max:5000',
            'g-recaptcha-response' => ['required', new ReCaptchaV3()],
        ]);

        try {
            // Prepare email data
            $contactData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'submitted_at' => now()->format('F j, Y \a\t g:i A'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ];

            // Send email to business owner
            Mail::to(config('mail.contact_recipient', 'jfieldfundraising@gmail.com'))
                ->send(new ContactFormMail($contactData));

            // Log successful contact form submission
            Log::info('Contact form submitted', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We\'ll get back to you within 2 business days.',
            ], 200);

        } catch (\Exception $e) {
            // Log error
            Log::error('Contact form error', [
                'error' => $e->getMessage(),
                'email' => $validated['email'] ?? 'unknown',
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again or contact us via LinkedIn.',
            ], 500);
        }
    }
}
