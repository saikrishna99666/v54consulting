<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\DynamicContent;

class ContactUsController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index()
    {
        // Fetch site settings for common info (already handled in AppServiceProvider likely, but we can pass it if needed)
        // Usually index.blade.php uses $siteSettings which is shared globally.
        return view('contact');
    }

    /**
     * Store a new contact inquiry.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'message' => 'required|string',
            'resume'  => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        // Split name into first and last name for the model
        $nameParts = explode(' ', trim($request->name), 2);
        $firstname = $nameParts[0];
        $lastname  = isset($nameParts[1]) ? $nameParts[1] : '';

        // Handle resume file upload
        $resumePath = null;
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
            $file       = $request->file('resume');
            $filename   = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/resumes'), $filename);
            $resumePath = $filename;
        }

        ContactUs::create([
            'Firstname'    => $firstname,
            'Lastname'     => $lastname,
            'EmailAddress' => $request->email,
            'Phoneno'      => $request->phone,
            'Message'      => $request->message,
            'resume'       => $resumePath,
            'source'       => $request->input('source', 'Contact Form'),
        ]);

        // Get admin email dynamically from settings or default
        $siteSettings = DynamicContent::first() ?? new DynamicContent();
        $adminEmail   = $siteSettings->notification_email ?: ($siteSettings->email ?: 'admin@example.com');

        // Send email notifications
        try {
            // 1. Email to admin with all the details
            \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\AdminContactNotification(
                $request->name,
                $request->email,
                $request->phone,
                $request->message
            ));

            // 2. Thank you email to sending person
            \Illuminate\Support\Facades\Mail::to($request->email)->send(new \App\Mail\UserContactThankYou(
                $request->name
            ));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send contact emails: ' . $e->getMessage());
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully! We will get back to you shortly.'
            ]);
        }

        return redirect()->back()->with('success', 'Your application has been submitted successfully! We will get back to you shortly.');
    }
}
