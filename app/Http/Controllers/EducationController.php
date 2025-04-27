<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    // Menampilkan daftar Education
    public function index()
    {
        $educations = Education::all();
        return view('educations.index', compact('educations'));
    }

    // Menampilkan form untuk membuat Education baru
    public function create()
    {
        return view('educations.create');
    }

    // Menyimpan Education baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Education::create($request->all());

        return redirect()->route('educations.index')->with('success', 'Education berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Education
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('educations.edit', compact('education'));
    }

    // Memperbarui Education di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $education = Education::findOrFail($id);
        $education->update($request->all());

        return redirect()->route('educations.index')->with('success', 'Education berhasil diperbarui.');
    }

    // Menghapus Education dari database
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('educations.index')->with('success', 'Education berhasil dihapus.');
    }
}
