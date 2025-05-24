<?php


namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {

        return view('Employees.AddEmployee', );
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
            ],
            'address' => 'nullable|string',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6',
            'user_type' => 'required|in:Admin,Operator', // ✅ Validate user type
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'adhar_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pan_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'phone.regex' => 'Phone number must be exactly 10 digits.',
            'email.unique' => 'This email is already registered.',
        ]);

        if ($request->password !== $request->password_confirmation) {
            return response()->json([
                'errors' => [
                    'password' => ['Password and Confirm Password do not match.']
                ]
            ], 422);
        }

        // ✅ File Uploads
        if ($request->hasFile('avatar')) {
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('adhar_image')) {
            $validatedData['adhar_image'] = $request->file('adhar_image')->store('adhar_images', 'public');
        }

        if ($request->hasFile('pan_image')) {
            $validatedData['pan_image'] = $request->file('pan_image')->store('pan_images', 'public');
        }

        // ✅ Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // ✅ Create Employee with user_type
        $employee = Employee::create($validatedData);
        // ✅ Redirect based on user_type
        if ($employee->user_type === 'Admin') {
            return response()->json([
                'message' => 'Admin added successfully!',
                'redirect' => route('admin.list')
            ]);
        } else {
            return response()->json([
                'message' => 'Operator added successfully!',
                'redirect' => route('operator.list')
            ]);
        }
    }


    public function AdminList()
    {
        $admins = Employee::where('user_type', 'Admin')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Employees.AdminList', compact('admins'));
    }


    public function OperatorList()
    {
        $employees = Employee::where('user_type', 'Operator')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Employees.EmployeeList', compact('employees'));
    }



    // Show single employee (View)
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Employees.ViewEmployee', compact('employee'));
    }

    // Edit form
    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        // Optional: You can conditionally load a different view if required
        if ($employee->user_type === 'Admin') {
            return view('Employees.EditAdmin', compact('employee'));
        } else {
            return view('Employees.EditEmployee', compact('employee'));
        }
    }


    // Update employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'user_type' => 'required|in:Admin,Operator',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'adhar_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pan_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('adhar_image')) {
            $validatedData['adhar_image'] = $request->file('adhar_image')->store('adhar_images', 'public');
        }

        if ($request->hasFile('pan_image')) {
            $validatedData['pan_image'] = $request->file('pan_image')->store('pan_images', 'public');
        }

        $employee->update($validatedData);

        // ✅ Redirect based on user_type
        if ($employee->user_type === 'Admin') {
            return redirect()->route('admin.list')->with('success', 'Admin updated successfully!');
        } else {
            return redirect()->route('operator.list')->with('success', 'Operator updated successfully!');
        }
    }

    // Delete employee
    public function adminDestroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.list')->with('success', 'Admin deleted successfully!');
    }
    public function operatorDestroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('operator.list')->with('success', 'Operator deleted successfully!');
    }

    public function activate($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->user_status = 'Active';
        $employee->save();

        return back()->with('success', 'User activated successfully!');
    }
    public function deactivate($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->user_status = 'inactive';
        $employee->save();

        return back()->with('success', 'User deactivated successfully!');
    }



}
