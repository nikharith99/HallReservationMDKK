<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Check if models exist
            if (class_exists('App\Models\Booking')) {
                $bookings = \App\Models\Booking::with('hall')->latest()->paginate(10);
                $stats = [
                    'total' => \App\Models\Booking::count(),
                    'pending' => \App\Models\Booking::where('status', 'pending')->count(),
                    'approved' => \App\Models\Booking::where('status', 'approved')->count(),
                    'rejected' => \App\Models\Booking::where('status', 'rejected')->count(),
                ];
            } else {
                // Fallback data
                $bookings = collect([]);
                $stats = [
                    'total' => 0,
                    'pending' => 0,
                    'approved' => 0,
                    'rejected' => 0,
                ];
            }
        } catch (\Exception $e) {
            // Fallback data on error
            $bookings = collect([]);
            $stats = [
                'total' => 0,
                'pending' => 0,
                'approved' => 0,
                'rejected' => 0,
            ];
        }
        
        return view('dashboard', compact('bookings', 'stats'));
    }
}
