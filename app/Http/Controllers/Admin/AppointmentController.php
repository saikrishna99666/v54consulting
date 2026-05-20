<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments with search and status filtering.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $appointments = Appointment::with('service')
            ->when($search, function ($query, $search) {
                return $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->orWhere('phone', 'LIKE', "%{$search}%")
                      ->orWhere('message', 'LIKE', "%{$search}%");
                });
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment)
    {
        $appointment->load('service');
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Update the status of the specified appointment.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,cancelled',
        ]);

        $appointment = Appointment::findOrFail($id);
        $oldStatus = $appointment->status;
        $appointment->status = $request->status;
        $appointment->save();

        // If status is updated to approved, send confirmation email to customer
        if ($request->status === 'approved' && $oldStatus !== 'approved') {
            try {
                \Illuminate\Support\Facades\Mail::to($appointment->email)
                    ->send(new \App\Mail\CustomerAppointmentApproved($appointment));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send appointment approval email: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Appointment status updated to ' . ucfirst($request->status) . ' successfully.');
    }

    /**
     * Remove the specified appointment from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
