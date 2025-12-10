<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }

        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .email-body {
            padding: 30px 20px;
        }

        .info-row {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e5e5;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #667eea;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .info-value {
            color: #333333;
            font-size: 16px;
        }

        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            border-radius: 4px;
            margin-top: 10px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666666;
            border-top: 1px solid #e5e5e5;
        }

        .metadata {
            font-size: 11px;
            color: #999999;
            margin-top: 10px;
        }

        .reply-button {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 24px;
            background-color: #667eea;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <h1>📬 New Contact Form Submission</h1>
        </div>

        <div class="email-body">
            <div class="info-row">
                <div class="info-label">From</div>
                <div class="info-value">{{ $contactData['name'] }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Email Address</div>
                <div class="info-value">
                    <a href="mailto:{{ $contactData['email'] }}" style="color: #667eea; text-decoration: none;">
                        {{ $contactData['email'] }}
                    </a>
                </div>
            </div>

            <div class="info-row">
                <div class="info-label">Subject</div>
                <div class="info-value">{{ $contactData['subject'] }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Message</div>
                <div class="message-box">{{ $contactData['message'] }}</div>
            </div>

            <div class="info-row">
                <div class="info-label">Submitted</div>
                <div class="info-value">{{ $contactData['submitted_at'] }}</div>
            </div>

            <center>
                <a href="mailto:{{ $contactData['email'] }}?subject=Re: {{ urlencode($contactData['subject']) }}"
                    class="reply-button">
                    Reply to {{ $contactData['email'] }}
                </a>
            </center>
        </div>

        <div class="email-footer">
            <p>This email was sent from your website contact form.</p>
            <div class="metadata">
                <strong>IP Address:</strong> {{ $contactData['ip_address'] ?? 'N/A' }}<br>
                <strong>User Agent:</strong> {{ Str::limit($contactData['user_agent'] ?? 'N/A', 80) }}
            </div>
        </div>
    </div>
</body>

</html>
