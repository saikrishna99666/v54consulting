<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Appointment is Confirmed!</title>
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
            padding: 35px 30px;
            text-align: center;
            border-bottom: 4px solid #e13833;
        }
        .header img {
            max-height: 55px;
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
            color: #15803d;
            font-size: 24px;
            font-weight: 800;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;
            background-color: #f0fdf4;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #dcfce7;
        }
        .meta-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #dcfce7;
            font-size: 14px;
        }
        .meta-table tr:last-child td {
            border-bottom: none;
        }
        .label {
            font-weight: 700;
            color: #166534;
            width: 35%;
        }
        .value {
            color: #14532d;
            font-weight: 600;
        }
        .info-card {
            background-color: #eff6ff;
            border-left: 4px solid #0048b4;
            padding: 20px;
            border-radius: 8px;
            margin: 24px 0;
        }
        .info-card p {
            margin: 0;
            color: #1e3a8a;
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
                <h2>🎉 Appointment Approved!</h2>
                <p>Dear {{ $appointment->name }},</p>
                <p>Great news! Your study abroad & visa advisory session with <strong>{{ isset($siteSettings) ? ($siteSettings->companyname ?: 'V54 Abroad Study Advisors') : 'V54 Abroad Study Advisors' }}</strong> has been officially **Approved and Scheduled**.</p>
                
                <div class="info-card">
                    <p>ℹ Our certified expert advisor will call you directly at your provided phone number (or reach out via email) at your scheduled slot details listed below.</p>
                </div>

                <h3>Confirmed Consultation Details:</h3>
                <table class="meta-table">
                    <tr>
                        <td class="label">Consultation Category</td>
                        <td class="value">{{ $appointment->service ? $appointment->service->ServicesTitle : 'General Consultation' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Confirmed Date</td>
                        <td class="value">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F j, Y (l)') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Scheduled Time Slot</td>
                        <td class="value">{{ $appointment->appointment_time }}</td>
                    </tr>
                    <tr>
                        <td class="label">Booking Status</td>
                        <td class="value">
                            <span style="background-color: #dcfce7; color: #15803d; padding: 4px 12px; border-radius: 50px; font-size: 12px; font-weight: 800; text-transform: uppercase;">
                                CONFIRMED & APPROVED
                            </span>
                        </td>
                    </tr>
                </table>

                <p>Please make sure you are in a quiet environment and have any active transcripts, target university names, or visa files accessible so we can make the most out of your consultation session.</p>

                <p>If you need to reschedule or have urgent questions before the call, feel free to reply to this email or call us at <a href="tel:{{ isset($siteSettings) ? $siteSettings->phone_number : '+917286847203' }}">{{ isset($siteSettings) ? $siteSettings->phone_number : '+91 7286847203' }}</a>.</p>
                
                <p>We are excited to help guide you on your international study path!</p>
                <p>Best regards,<br><strong>The V54 Study Advisors Team</strong></p>
            </div>
            
            <div class="footer">
                <p>You received this email because your online appointment request on our website has been approved by the system administration.</p>
                <p>&copy; {{ date('Y') }} {{ isset($siteSettings) ? ($siteSettings->companyname ?: 'V54 Abroad Study Advisors') : 'V54 Abroad Study Advisors' }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
