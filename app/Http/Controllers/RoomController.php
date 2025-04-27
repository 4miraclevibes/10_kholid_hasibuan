<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // Menampilkan daftar Room
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    // Menampilkan form untuk membuat Room baru
    public function create()
    {
        return view('rooms.create');
    }

    // Menyimpan Room baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Room
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    // Memperbarui Room di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room berhasil diperbarui.');
    }

    // Menghapus Room dari database
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room berhasil dihapus.');
    }
}
