<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for contacting us!</title>
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
            margin-bottom: 16px;
        }
        .intro-text {
            font-size: 16px;
            color: #334155;
            margin-bottom: 24px;
        }
        .features-grid {
            background-color: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            margin: 24px 0;
            border: 1px solid #f1f5f9;
        }
        .feature-item {
            margin-bottom: 16px;
        }
        .feature-item:last-child {
            margin-bottom: 0;
        }
        .feature-title {
            font-weight: 600;
            color: #0f172a;
            font-size: 15px;
            margin-bottom: 4px;
        }
        .feature-desc {
            color: #64748b;
            font-size: 14px;
            margin: 0;
        }
        .contact-info {
            border-top: 2px solid #f1f5f9;
            padding-top: 24px;
            margin-top: 30px;
        }
        .contact-info h3 {
            font-size: 16px;
            color: #0f172a;
            margin-top: 0;
            margin-bottom: 12px;
        }
        .contact-detail {
            font-size: 14px;
            color: #475569;
            margin: 4px 0;
        }
        .contact-detail a {
            color: #3b82f6;
            text-decoration: none;
        }
        .social-links {
            margin-top: 20px;
            text-align: center;
        }
        .social-link {
            display: inline-block;
            margin: 0 8px;
            color: #475569;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }
        .social-link:hover {
            color: #3b82f6;
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
                <h2>Thank You For Contacting Us!</h2>
                <p class="intro-text">Dear {{ $name }},</p>
                <p class="intro-text">
                    Thank you for reaching out to us. We have successfully received your inquiry through our website contact form. One of our professional immigration and visa consultants is reviewing your request and will get back to you shortly.
                </p>
                
                <div class="features-grid">
                    <div class="feature-item">
                        <div class="feature-title">What happens next?</div>
                        <p class="feature-desc">Our dedicated team will review the information you submitted and prepare dynamic, custom-tailored recommendations matching your profile.</p>
                    </div>
                    <div class="feature-item" style="margin-top: 16px;">
                        <div class="feature-title">Need immediate assistance?</div>
                        <p class="feature-desc">If you have an urgent inquiry, please don't hesitate to contact us directly using the phone number or email address below.</p>
                    </div>
                </div>
                
                <div class="contact-info">
                    <h3>Our Direct Details</h3>
                    @if($siteSettings->phone_number)
                        <div class="contact-detail"><strong>Phone:</strong> <a href="tel:{{ $siteSettings->phone_number }}">{{ $siteSettings->phone_number }}</a></div>
                    @endif
                    @if($siteSettings->email)
                        <div class="contact-detail"><strong>Email:</strong> <a href="mailto:{{ $siteSettings->email }}">{{ $siteSettings->email }}</a></div>
                    @endif
                    @if($siteSettings->address)
                        <div class="contact-detail"><strong>Address:</strong> {{ strip_tags($siteSettings->address) }}</div>
                    @endif
                </div>

                @if($siteSettings->facebook_link || $siteSettings->twitter_link || $siteSettings->linkedin_link || $siteSettings->instagram_link)
                    <div class="social-links">
                        @if($siteSettings->facebook_link)
                            <a href="{{ $siteSettings->facebook_link }}" class="social-link" target="_blank">Facebook</a>
                        @endif
                        @if($siteSettings->twitter_link)
                            <a href="{{ $siteSettings->twitter_link }}" class="social-link" target="_blank">Twitter</a>
                        @endif
                        @if($siteSettings->linkedin_link)
                            <a href="{{ $siteSettings->linkedin_link }}" class="social-link" target="_blank">LinkedIn</a>
                        @endif
                        @if($siteSettings->instagram_link)
                            <a href="{{ $siteSettings->instagram_link }}" class="social-link" target="_blank">Instagram</a>
                        @endif
                    </div>
                @endif
            </div>
            
            <div class="footer">
                <p>This email is sent on behalf of {{ $siteSettings->companyname ?: config('app.name') }} in response to a contact request.</p>
                <p>&copy; {{ date('Y') }} {{ $siteSettings->companyname ?: config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
