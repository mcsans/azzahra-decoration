<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::with('role')
            ->whereRelation('role', 'name', '!=', 'ADMIN')
            ->latest()
            ->get();

        return view('admin.users.index', $data);
    }

    public function create()
    {
        $data['roles'] = Role::whereNotIn('name', ['ADMIN'])->orderBy('name')->get();

        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email',
        ]);

        $validated['password'] = Hash::make('Password123!');

        try {

            DB::transaction(function () use ($validated) {
                User::create($validated);
            });

            return redirect()->route('admin.master-data.users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {

            Log::error('Failed to create user: ' . $e->getMessage());

            return redirect()->route('admin.master-data.users.index')->with('error', 'Failed to create user.');
        }
    }

    public function show(User $user)
    {
        $data['user'] = $user;

        return view('admin.users.show', $data);
    }

    public function edit(User $user)
    {
        $data['user'] = $user;
        $data['roles'] = Role::whereNotIn('name', ['ADMIN'])->orderBy('name')->get();

        return view('admin.users.edit', $data);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email,' . $user->id,
        ]);

        try {

            DB::transaction(function () use ($validated, $user) {
                User::where('id', $user->id)->update($validated);
            });

            return redirect()->route('admin.master-data.users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {

            Log::error('Failed to update user: ' . $e->getMessage());

            return redirect()->route('admin.master-data.users.index')->with('error', 'Failed to update user.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.master-data.users.index')->with('success', 'User deleted successfully.');
    }
}
