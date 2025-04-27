<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Patient;
use App\Models\PatientCategory;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        // Mengambil semua data registrasi beserta relasinya
        $registrations = Registration::with(['patient', 'patientCategory', 'employee', 'room'])->get();

        // Mengirim data registrasi ke view
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $patients = Patient::all();
        $patientCategories = PatientCategory::all();
        $employees = Employee::where('id', Auth::user()->id)->get();
        $rooms = Room::all();
        return view('registrations.create', compact('patients', 'patientCategories', 'employees', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'patient_category_id' => 'required|exists:patient_categories,id',
            'employee_id' => 'required|exists:employees,id',
            'room_id' => 'required|exists:rooms,id',
            'insurance_number' => 'required|string|max:255',
            'date' => 'required|date',
            'is_inpatient' => 'required|boolean',
        ]);

        Registration::create($request->all());

        return redirect()->route('registrations.index')->with('success', 'Registration created successfully.');
    }

    public function show($id)
    {
        $registration = Registration::with('patient', 'patientCategory', 'employee', 'room')->findOrFail($id);
        return view('registrations.show', compact('registration'));
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        $patients = Patient::all();
        $patientCategories = PatientCategory::all();
        $employees = Employee::where('id', Auth::user()->id)->get();
        $rooms = Room::all();

        return view('registrations.edit', compact('registration', 'patients', 'patientCategories', 'employees', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);
        $registration->update($request->all());

        return redirect()->route('registrations.index')->with('success', 'Registrasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully.');
    }
}
