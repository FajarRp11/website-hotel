<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::where('room_status', 'available')->get();
        return view('booking', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Room $room)
    {
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        // Pastikan user memiliki data customer
        $customer = Auth::user()->customer;
        
        if (!$customer) {
            return redirect()->back()
                ->with('error', 'Please complete your customer profile first.');
        }

        // Perbaikan perhitungan jumlah hari
        $checkIn = Carbon::parse($request->check_in_date)->startOfDay();
        $checkOut = Carbon::parse($request->check_out_date)->startOfDay();

        // Perhitungan jumlah hari
        $numberOfDays = $checkIn->diffInDays($checkOut) + 1;

        // Pastikan nilai dalam bentuk integer
        $numberOfDays = (int) $numberOfDays;

        // Validasi ketersediaan kamar
        if (!$this->isRoomAvailable($room->id, $checkIn, $checkOut)) {
            return redirect()->back()
                ->with('error', 'Room is not available for selected dates.');
        }

        // Hitung total cost
        $totalCost = $room->price_per_night * $numberOfDays;

        // Create transaction dengan status pending
        $transaction = Transaction::create([
            'customer_id' => $customer->id,
            'room_id' => $room->id,
            'check_in_date' => $checkIn,
            'check_out_date' => $checkOut,
            'total_cost' => $totalCost,
            'booking_number' => Transaction::generateBookingNumber(),
            'status' => 'pending' // Tambahkan status
        ]);

        // Update room status menjadi booked
        // $room->update(['room_status' => 'booked']);

        return redirect()->route('mybooking')
            ->with('success', 'Booking successful! Total cost: Rp. ' . number_format($totalCost, 0, ',', '.'));
    }

    // Tambahkan validasi untuk check ketersediaan kamar
    private function isRoomAvailable($roomId, $checkIn, $checkOut)
    {
        return !Transaction::where('room_id', $roomId)
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out_date', [$checkIn, $checkOut]);
            })->exists();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function myBookings()
    {
        $bookings = Transaction::where('customer_id', Auth::user()->customer->id)
            ->with(['room']) // Eager load room relationship
            ->latest() // Urutkan dari yang terbaru
            ->get();

        return view('my-bookings', compact('bookings'));
    }

    public function cancel(Transaction $transaction)
    {
        // Validasi apakah booking ini milik user yang sedang login
        if ($transaction->customer_id !== Auth::user()->customer->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Validasi apakah booking masih bisa dicancel (masih pending)
        if ($transaction->status !== 'pending') {
            return redirect()->back()->with('error', 'Booking cannot be cancelled.');
        }

        // Update status menjadi cancelled
        $transaction->update(['status' => 'cancelled']);

        // Set room status kembali ke available
        $transaction->room->update(['room_status' => 'available']);

        return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
    }
}
