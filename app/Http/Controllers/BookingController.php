<?php
// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $halls = Hall::all();
        return view('bookings.create', compact('halls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'organizer_name' => 'required|string|max:255',
            'organizer_ic' => 'required|string|max:20',
            'organization' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'purpose' => 'nullable|string',
            'attendees' => 'nullable|integer|min:1',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]);

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        // Create booking
        Booking::create([
            'hall_id' => $request->hall_id,
            'organizer_name' => $request->organizer_name,
            'organizer_ic' => $request->organizer_ic,
            'organization' => $request->organization,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'purpose' => $request->purpose,
            'attendees' => $request->attendees,
            'attachment' => $attachmentPath,
            'status' => 'pending'
        ]);

        // Redirect to dashboard with success message
        return redirect()->route('dashboard')
            ->with('success', 'Permohonan tempahan anda telah berjaya dihantar! Kami akan menghubungi anda melalui email untuk pengesahan.');
    }
}
