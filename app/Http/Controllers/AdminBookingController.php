<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hall;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $approvedBookings = Booking::where('status', 'confirmed')->count();
        $rejectedBookings = Booking::where('status', 'cancelled')->count();

        return view('admin.dashboardAdmin', compact(
            'totalBookings',
            'pendingBookings',
            'approvedBookings',
            'rejectedBookings'
        ));
    }

    /**
     * Display a listing of all bookings for admin.
     */
    public function index()
    {
        $bookings = Booking::with('hall')->latest()->get();

        // Debug: Check if we have data
        // dd($bookings); // Uncomment to check data

        // Calculate stats
        $stats = [
            'total' => $bookings->count(),
            'pending' => $bookings->where('status', 'pending')->count(),
            'confirmed' => $bookings->where('status', 'confirmed')->count(),
            'cancelled' => $bookings->where('status', 'cancelled')->count(),
        ];

        // Debug: Check if view exists
        if (!view()->exists('admin.bookings.index')) {
            dd('View still not found. Check the exact path.');
        }

        return view('admin.bookings.index', compact('bookings', 'stats'));
    }

    /**
     * Show the form for creating a new booking (admin side).
     */
    public function create()
    {
        $halls = Hall::all();
        return view('admin.bookings.create', compact('halls'));
    }

    /**
     * Store a newly created booking from admin side.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'organizer_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'purpose' => 'required|string',
            'status' => 'required|in:pending,approved,rejected'
        ]);

        Booking::create([
            'hall_id' => $request->hall_id,
            'organizer_name' => $request->organizer_name,
            'organization' => $request->organization,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'purpose' => $request->purpose,
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Tempahan baru telah berjaya dibuat.');
    }

    /**
     * Display the specified booking details.
     */
    public function show(string $id)
    {
        $booking = Booking::with('hall')->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        $halls = Hall::all();
        return view('admin.bookings.edit', compact('booking', 'halls'));
    }

    /**
     * Update the specified booking.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'hall_id' => 'required|exists:halls,id',
            'organizer_name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'purpose' => 'required|string',
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $booking->update([
            'hall_id' => $request->hall_id,
            'organizer_name' => $request->organizer_name,
            'organization' => $request->organization,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'purpose' => $request->purpose,
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Tempahan telah berjaya dikemas kini.');
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Tempahan telah berjaya dipadam.');
    }

    /**
     * Approve a booking
     */
    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Tempahan telah diluluskan.');
    }

    /**
     * Reject a booking
     */
    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Tempahan telah ditolak.');
    }

    /**
     * Update booking status with notes
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,pending',
            'admin_notes' => 'nullable|string|max:500'
        ]);

        $booking->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        $statusText = [
            'approved' => 'diluluskan',
            'rejected' => 'ditolak',
            'pending' => 'dikembalikan ke status menunggu'
        ];

        return redirect()->route('admin.bookings.index')
            ->with('success', "Tempahan telah {$statusText[$request->status]}.");
    }
}
