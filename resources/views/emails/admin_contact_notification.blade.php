<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Inquiry</title>
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
            background-color: #0f172a;
            padding: 30px;
            text-align: center;
            border-bottom: 4px solid #3b82f6;
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
            width: 30%;
        }
        .value {
            color: #0f172a;
            font-weight: 500;
        }
        .message-box {
            background-color: #eff6ff;
            border-left: 4px solid #3b82f6;
            padding: 24px;
            border-radius: 8px;
            margin-top: 24px;
        }
        .message-title {
            font-weight: 700;
            color: #1e3a8a;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
        }
        .message-text {
            color: #1e293b;
            font-size: 15px;
            white-space: pre-wrap;
            margin: 0;
            line-height: 1.6;
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
            color: #3b82f6;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                @if($siteSettings && $siteSettings->logoimage)
                    <img src="{{ asset('uploads/settings/' . $siteSettings->logoimage) }}" alt="{{ $siteSettings->companyname ?: config('app.name') }}">
                @else
                    <h1>{{ $siteSettings->companyname ?: config('app.name') }}</h1>
                @endif
            </div>
            
            <div class="content">
                <h2>New Contact Inquiry</h2>
                <p>Hello Admin,</p>
                <p>You have received a new message through the website contact form. Here are the submission details:</p>
                
                <table class="meta-table">
                    <tr>
                        <td class="label">Name</td>
                        <td class="value">{{ $name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email Address</td>
                        <td class="value"><a href="mailto:{{ $email }}">{{ $email }}</a></td>
                    </tr>
                    <tr>
                        <td class="label">Phone Number</td>
                        <td class="value">{{ $phone ?: 'Not provided' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Submitted At</td>
                        <td class="value">{{ now()->format('F j, Y, g:i a') }}</td>
                    </tr>
                </table>
                
                <div class="message-box">
                    <div class="message-title">Message Body</div>
                    <p class="message-text">{{ $messageBody }}</p>
                </div>
            </div>
            
            <div class="footer">
                <p>This is an automated notification sent from the contact form at <a href="{{ url('/') }}">{{ request()->getHost() }}</a>.</p>
                <p>&copy; {{ date('Y') }} {{ $siteSettings->companyname ?: config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
