<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->ajax() && $request->has('search')) {
            $query->where('phone_number', 'like', '%' . $request->search . '%');
            $users = $query->orderBy('created_at', 'desc')->get();

            return view('users.partials.user_card_list', compact('users'))->render();
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('users.UserList', compact('users'));
    }

    public function index1(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('users.list', compact('users'));
    }

    public function create()
    {
        return view('users.AddUser');
    }
    public function store(Request $request)
    {
        // ✅ Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|string|unique:users',
            'address' => 'nullable|string',
            'password' => 'required|string|confirmed',
            'aadhaar_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'pan_card_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'verification_status' => 'in:Verified,Unverified',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // ✅ Aadhaar image upload
        if ($request->hasFile('aadhaar_image')) {
            $validatedData['aadhaar_image'] = $request->file('aadhaar_image')->store('aadhaar', 'public');
        }

        // ✅ PAN card image upload
        if ($request->hasFile('pan_card_image')) {
            $validatedData['pan_card_image'] = $request->file('pan_card_image')->store('pan', 'public');
        }

        // ✅ Avatar image upload or default
        if ($request->hasFile('avatar')) {
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        } else {
            $validatedData['avatar'] = 'avatars/user_default.jpg'; // Path in public/storage/avatars/
        }

        // ✅ Create user
        $user = User::create($validatedData);

        // ✅ Return success response with redirect URL
        return response()->json([
            'message' => 'User created successfully',
            'redirect' => route('users.lists') // This route must exist
        ]);
    }

public function show($id)
{
    $user = User::findOrFail($id);

    $tasks = Task::where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    $allTasks = Task::where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);

    $services = Service::orderBy('name', 'asc')->get();

    if (request()->ajax()) {
        return view('users.partials.task-table', compact('allTasks'))->render();
    }

    return view('users.UserView', compact('user', 'services', 'tasks', 'allTasks'));
}



    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.EditUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_number' => 'required|string|unique:users,phone_number,' . $id,
            'address' => 'nullable|string',
            'password' => 'nullable|string|confirmed',
            'aadhaar_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'pan_card_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'verification_status' => 'in:Verified,Unverified',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('password');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('aadhaar_image')) {
            if ($user->aadhaar_image) {
                Storage::disk('public')->delete($user->aadhaar_image);
            }
            $data['aadhaar_image'] = $request->file('aadhaar_image')->store('aadhaar', 'public');
        }

        if ($request->hasFile('pan_card_image')) {
            if ($user->pan_card_image) {
                Storage::disk('public')->delete($user->pan_card_image);
            }
            $data['pan_card_image'] = $request->file('pan_card_image')->store('pan', 'public');
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar && $user->avatar !== 'avatars/user_default.jpg') {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('users.lists')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete related files
        if ($user->aadhaar_image) {
            Storage::disk('public')->delete($user->aadhaar_image);
        }

        if ($user->pan_card_image) {
            Storage::disk('public')->delete($user->pan_card_image);
        }

        if ($user->avatar && $user->avatar !== 'avatars/user_default.jpg') {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.lists')->with('success', 'User deleted successfully!');
    }


    public function toggleVerification(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Accept only 'Verified' or 'Unverified'
        $status = $request->status === 'Verified' ? 'Verified' : 'Unverified';
        $user->verification_status = $status;
        $user->save();

        return redirect()->back()->with('success', 'User verification status updated successfully.');
    }

}
