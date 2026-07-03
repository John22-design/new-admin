<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCaptchaV3 implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('The reCAPTCHA verification token is missing.');
            return;
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $value,
        ]);

        if (!$response->successful()) {
            $fail('Unable to connect to the reCAPTCHA verification service.');
            return;
        }

        $data = $response->json();

        if (empty($data['success'])) {
            \Illuminate\Support\Facades\Log::error('reCAPTCHA verification failed', [
                'response_data' => $data,
                'secret_configured' => !empty(config('services.recaptcha.secret')),
            ]);
            $fail('The reCAPTCHA verification failed. Please try again.');
            return;
        }

        // Default threshold for reCAPTCHA v3 is 0.5
        $score = $data['score'] ?? 0.0;
        $threshold = config('services.recaptcha.threshold', 0.5);

        if ($score < $threshold) {
            $fail('Spam activity detected. Form submission blocked.');
        }
    }
}
