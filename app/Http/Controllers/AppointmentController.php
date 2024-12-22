<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointment.create');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date',
            'customer_name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
        ]);

        Appointment::create([
            'customer_name' => $request->input('customer_name'),
            'service' => $request->input('service'),
            'appointment_date' => $request->input('appointment_date'),
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment scheduled successfully!');
    }

    public function index()
    {
        $appointments = Appointment::all();
        return view('appointment.index', compact('appointments'));
    }
}
