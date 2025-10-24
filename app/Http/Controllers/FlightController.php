<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Flight;

class FlightController extends Controller
{
    public function index()
    {
        // Gunakan empty array jika belum ada model Flight
        $flights = [];
        
        // Ambil semua data user 
        $users = User::all();
        
        return view('admin', compact('flights', 'users'));
    }

    public function create()
    {
        return view('admin.flights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required',
            'airline' => 'required',
            'origin' => 'required', 
            'destination' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|numeric'
        ]);

        // Flight::create($request->all()); // Uncomment jika model Flight ada
        
        return redirect()->route('admin')->with('success', 'Penerbangan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // $flight = Flight::findOrFail($id);
        // return view('admin.flights.edit', compact('flight'));
        return "Edit flight form for ID: " . $id;
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin')->with('success', 'Penerbangan berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Flight::destroy($id);
        return redirect()->route('admin')->with('success', 'Penerbangan berhasil dihapus!');
    }
}