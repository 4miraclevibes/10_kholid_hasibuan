<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;

class ActionController extends Controller
{
    // Menampilkan daftar Action
    public function index()
    {
        $actions = Action::all();
        return view('actions.index', compact('actions'));
    }

    // Menampilkan form untuk membuat Action baru
    public function create()
    {
        return view('actions.create');
    }

    // Menyimpan Action baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'action' => 'required|string|max:255',
            'code_icd' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Action::create($request->all());

        return redirect()->route('actions.index')->with('success', 'Action berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit Action
    public function edit($id)
    {
        $action = Action::findOrFail($id);
        return view('actions.edit', compact('action'));
    }

    // Memperbarui Action di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|string|max:255',
            'code_icd' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $action = Action::findOrFail($id);
        $action->update($request->all());

        return redirect()->route('actions.index')->with('success', 'Action berhasil diperbarui.');
    }

    // Menghapus Action dari database
    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();

        return redirect()->route('actions.index')->with('success', 'Action berhasil dihapus.');
    }
}
