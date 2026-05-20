<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\DynamicContent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Show the standalone appointment booking page.
     */
    public function index()
    {
        $services = \App\Models\Service::where('status', '1')->get();
        return view('book-appointment', compact('services'));
    }

    /**
     * Store a newly created appointment booking.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'required|string|max:20',
            'service_id'       => 'nullable|exists:services,Serviceid',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string|max:100',
            'message'          => 'nullable|string|max:1000',
        ]);

        $appointment = Appointment::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'service_id'       => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'message'          => $request->message,
            'status'           => 'pending',
        ]);

        // Fetch settings for notification email fallback
        $siteSettings = DynamicContent::first() ?? new DynamicContent();
        $adminEmail   = $siteSettings->notification_email ?: ($siteSettings->email ?: 'admin@example.com');

        try {
            // 1. Notify Admin
            Mail::to($adminEmail)->send(new \App\Mail\AdminAppointmentNotification($appointment));

            // 2. Confirm to Customer
            Mail::to($appointment->email)->send(new \App\Mail\CustomerAppointmentConfirmation($appointment));
        } catch (\Exception $e) {
            Log::error('Failed to send appointment emails: ' . $e->getMessage());
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your appointment has been requested successfully! We have sent a confirmation email and will contact you shortly.'
            ]);
        }

        return redirect()->back()->with('success', 'Your appointment has been requested successfully! We have sent a confirmation email and will contact you shortly.');
    }
}
