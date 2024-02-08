<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserActionNotification;



class UsersController extends Controller
{
    public function index(){

        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.index', ['users' => $users]);
    }
    public function create()
    {
        $roles = Role::all(); // Fetch all roles
        return view('users.create', compact('roles')); // Pass roles to the view
    }
   
public function store(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['nullable', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'roles' => ['required', 'array'], // Validate roles input as an array
        'roles.*' => ['exists:roles,id'], // Validate each role ID exists in the roles table
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
    ]);

    // Attach roles to the user. Ensure roles are passed as an array of role IDs in the request
    if($request->has('roles')) {
        $user->roles()->attach($request->roles);
    }
    $user->notify(new UserActionNotification('User Created', 'A new user has been created.'));
    Auth::login($user);

    return redirect()->route('users.index');
    // return response()->json(['user' => $user], 201);
}
    
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);  // Eager load roles with the user

        $roles = Role::all();  // Get all roles for the dropdown in the view

        return view('users.show', compact('user', 'roles'));  // Pass both user and roles to the view
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'phone' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8|confirmed',
        'roles' => 'required|array',  // Validate roles input as an array
        'roles.*' => 'exists:roles,id'  // Each role id must exist in the roles table
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    $user->roles()->sync($request->roles);  // Sync roles

    return redirect()->route('users.index')->with('success', 'User updated successfully');
}
public function destroy($id)
{
    // Find the user by ID
    $user = User::findOrFail($id);

    // Delete the user
    $user->delete();

    // Redirect to the users index page with a success message
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
}

    public function logout()
    {
        Auth::logout();

        // Redirect to a page after logout (e.g., the login page)
        return redirect()->route('login');
    }

}