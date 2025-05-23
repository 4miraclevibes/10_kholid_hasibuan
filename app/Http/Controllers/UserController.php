<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('user.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Role::all();
        return view('user.create', [
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $employee = Employee::create([
            'user_id' => $user->id,
            'role_id' => $request->role_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        
        return redirect()->route('user.index')->with('success', 'SUKSES');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Auth::user()->employee->role->name == 'admin'){
            $item = User::where('id', $id)->with('employee')->first();
            $data = Role::whereNot('id', $item->employee->role->id)->get();
        } else {
            $item = User::where('id', $id)->with('employee')->first();
            $data = Role::whereNot('id', Auth::user()->employee->role->id)->get();
        }
        return view('user.edit', [
            'item' => $item,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $employee = Employee::where('user_id', $id)->first();
        $data = $request->all();
        $data['user_id'] = $id;
        if($employee == null){
            Employee::create($data);
        } else {
            $employee->update($data);
        }
        if($request->password){
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $item->update($data);
        return redirect()->route('user.index')->with('success', 'SUKSES');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return back()->with('success', 'SUKSESS');
    }
}
