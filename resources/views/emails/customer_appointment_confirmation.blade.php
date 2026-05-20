<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking Received</title>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #1e293b;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            background-color: #f8fafc;
            padding: 40px 20px;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }
        .header {
            background-color: #0048b4;
            padding: 30px;
            text-align: center;
            border-bottom: 4px solid #e13833;
        }
        .header img {
            max-height: 50px;
            margin-bottom: 10px;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .content {
            padding: 40px;
        }
        .content h2 {
            margin-top: 0;
            color: #0f172a;
            font-size: 22px;
            font-weight: 700;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 12px;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;
            background-color: #f8fafc;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }
        .meta-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .meta-table tr:last-child td {
            border-bottom: none;
        }
        .label {
            font-weight: 600;
            color: #64748b;
            width: 35%;
        }
        .value {
            color: #0f172a;
            font-weight: 500;
        }
        .highlight-box {
            background-color: #f0fdf4;
            border-left: 4px solid #22c55e;
            padding: 20px;
            border-radius: 8px;
            margin: 24px 0;
        }
        .highlight-box p {
            margin: 0;
            color: #166534;
            font-size: 15px;
            font-weight: 500;
        }
        .footer {
            background-color: #f1f5f9;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #64748b;
        }
        .footer p {
            margin: 4px 0;
        }
        .footer a {
            color: #0048b4;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                @if(isset($siteSettings) && $siteSettings->logoimage)
                    <img src="{{ asset('uploads/settings/' . $siteSettings->logoimage) }}" alt="{{ $siteSettings->companyname ?: config('app.name') }}">
                @else
                    <h1>{{ isset($siteSettings) ? ($siteSettings->companyname ?: config('app.name')) : config('app.name') }}</h1>
                @endif
            </div>
            
            <div class="content">
                <h2>Appointment Received!</h2>
                <p>Dear {{ $appointment->name }},</p>
                <p>Thank you for scheduling your online consultation with <strong>{{ isset($siteSettings) ? ($siteSettings->companyname ?: 'V54 Abroad Study Advisors') : 'V54 Abroad Study Advisors' }}</strong>. We have received your booking request, and our certified advisors are reviewing it now.</p>
                
                <div class="highlight-box">
                    <p>✓ Your booking request has been submitted successfully and is currently under review by our advisory team. We will contact you shortly to confirm or adjust your slot.</p>
                </div>

                <h3>Consultation Summary:</h3>
                <table class="meta-table">
                    <tr>
                        <td class="label">Desired Service</td>
                        <td class="value">{{ $appointment->service ? $appointment->service->ServicesTitle : 'General Consultation' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Requested Date</td>
                        <td class="value">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y (l)') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Time Slot</td>
                        <td class="value">{{ $appointment->appointment_time }}</td>
                    </tr>
                    <tr>
                        <td class="label">Booking Status</td>
                        <td class="value">
                            <span style="background-color: #fef3c7; color: #d97706; padding: 4px 10px; border-radius: 50px; font-size: 12px; font-weight: 700; text-transform: uppercase;">
                                Pending Review
                            </span>
                        </td>
                    </tr>
                </table>

                <p>If you have any questions or need to reschedule, please feel free to reply directly to this email or reach us at <a href="tel:{{ isset($siteSettings) ? $siteSettings->phone_number : '+917286847203' }}">{{ isset($siteSettings) ? $siteSettings->phone_number : '+91 7286847203' }}</a>.</p>
                
                <p>We look forward to helping you shape your global career!</p>
                <p>Warm regards,<br><strong>The V54 Support Team</strong></p>
            </div>
            
            <div class="footer">
                <p>You received this automated confirmation email because you submitted an appointment booking form on our website.</p>
                <p>&copy; {{ date('Y') }} {{ isset($siteSettings) ? ($siteSettings->companyname ?: 'V54 Abroad Study Advisors') : 'V54 Abroad Study Advisors' }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
