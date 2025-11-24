<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Unit;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('unit')->latest()->paginate(10);
        return view('pages.rooms.index', compact('rooms'));
    }

    public function create()
    {
        // Kirim data unit agar bisa dipilih di dropdown
        $units = Unit::where('status', 'aktif')->get(); 
        return view('pages.rooms.create', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id', // Validasi relasi
            'status' => 'required|in:tersedia,perbaikan,digunakan',
        ]);

        Room::create($request->all());
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil ditambahkan.');
    }

    public function edit(Room $room)
    {
        $units = Unit::where('status', 'aktif')->get();
        return view('pages.rooms.edit', compact('room', 'units'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
            'status' => 'required|in:tersedia,perbaikan,digunakan',
        ]);

        $room->update($request->all());
        return redirect()->route('ruangan.index')->with('success', 'Ruangan berhasil diperbarui.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan dihapus.');
    }
}