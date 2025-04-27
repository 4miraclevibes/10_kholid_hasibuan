<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCategory;

class PatientCategoryController extends Controller
{
    // Menampilkan daftar Patient Categories
    public function index()
    {
        $patientCategories = PatientCategory::all();
        return view('patient_categories.index', compact('patientCategories'));
    }

    // Menampilkan form untuk membuat Patient Category baru
    public function create()
    {
        return view('patient_categories.create');
    }

    // Menyimpan Patient Category baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PatientCategory::create($request->all());

        return redirect()->route('patient_categories.index')->with('success', 'Patient Category berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Patient Category
    public function edit($id)
    {
        $patientCategory = PatientCategory::findOrFail($id);
        return view('patient_categories.edit', compact('patientCategory'));
    }

    // Memperbarui Patient Category di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $patientCategory = PatientCategory::findOrFail($id);
        $patientCategory->update($request->all());

        return redirect()->route('patient_categories.index')->with('success', 'Patient Category berhasil diperbarui.');
    }

    // Menghapus Patient Category dari database
    public function destroy($id)
    {
        $patientCategory = PatientCategory::findOrFail($id);
        $patientCategory->delete();

        return redirect()->route('patient_categories.index')->with('success', 'Patient Category berhasil dihapus.');
    }
}
