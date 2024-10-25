<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'task_id' => 'required|exists:tasks,id',
        'user_id' => 'required|exists:users,id',
    ]);

    // Create the booking
    Booking::create([
        'task_id' => $validatedData['task_id'],
        'user_id' => $validatedData['user_id'],
        'status' => 'dealed',
    ]);

    return response()->json(['message' => 'Booking created successfully!']);
}

}
