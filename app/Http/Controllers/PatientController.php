<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use App\Models\Education;
use App\Models\Employment;
use Illuminate\Http\Request;

class PatientController extends Controller
{

// Ambil semua cities berdasarkan province_id
public function getCities($provinceId)
{
    $cities = \Indonesia::findProvince($provinceId, ['cities'])->cities;
    return response()->json($cities);
}

// Ambil semua districts berdasarkan city_id
public function getDistricts($cityId)
{
    $districts = \Indonesia::findCity($cityId, ['districts'])->districts;
    return response()->json($districts);
}

// Ambil semua villages berdasarkan district_id
public function getVillages($districtId)
{
    $villages = \Indonesia::findDistrict($districtId, ['villages'])->villages;
    return response()->json($villages);
}

// Menampilkan form create pasien
public function create()
{
    $provinces = \Indonesia::allProvinces();
    $educations = Education::all();
    $employments = Employment::all();
    
    return view('patients.create', compact('provinces', 'educations', 'employments'));
}
    
    // Menampilkan daftar pasien
    public function index()
    {
        $patients = Patient::with(['province', 'city', 'district', 'village', 'education', 'employment'])->get();
        return view('patients.index', compact('patients'));
    }
    
    // Menyimpan pasien baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'province_id' => 'required|integer',
            'city_id' => 'required|integer',
            'district_id' => 'required|integer',
            'village_id' => 'required|integer',
            'education_id' => 'required|integer',
            'employment_id' => 'required|integer',
            'nrm' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'birth_place' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'guardian_name' => 'nullable|string',
            'identity_number' => 'nullable|string',
            'allergy' => 'nullable|string',
            'is_employee' => 'nullable|boolean',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit pasien
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $educations = Education::all();
        $employments = Employment::all();
        return view('patients.edit', compact('patient', 'educations', 'employments'));
    }

    // Memperbarui pasien di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'education_id' => 'required|integer',
            'employment_id' => 'required|integer',
            'nrm' => 'nullable|string|max:255',
            'birth_place' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'guardian_name' => 'nullable|string',
            'identity_number' => 'nullable|string',
            'allergy' => 'nullable|string',
            'is_employee' => 'nullable|boolean',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    // Menampilkan daftar pasien
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patients.show', compact('patient'));
    }

    // Menghapus pasien dari database
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
