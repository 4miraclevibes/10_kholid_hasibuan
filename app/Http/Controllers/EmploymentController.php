<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;

class EmploymentController extends Controller
{
    // Menampilkan daftar Employment
    public function index()
    {
        $employments = Employment::all();
        return view('employments.index', compact('employments'));
    }

    // Menampilkan form untuk membuat Employment baru
    public function create()
    {
        return view('employments.create');
    }

    // Menyimpan Employment baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Employment::create($request->all());

        return redirect()->route('employments.index')->with('success', 'Employment berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Employment
    public function edit($id)
    {
        $employment = Employment::findOrFail($id);
        return view('employments.edit', compact('employment'));
    }

    // Memperbarui Employment di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $employment = Employment::findOrFail($id);
        $employment->update($request->all());

        return redirect()->route('employments.index')->with('success', 'Employment berhasil diperbarui.');
    }

    // Menghapus Employment dari database
    public function destroy($id)
    {
        $employment = Employment::findOrFail($id);
        $employment->delete();

        return redirect()->route('employments.index')->with('success', 'Employment berhasil dihapus.');
    }
}
