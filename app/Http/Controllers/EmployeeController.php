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
        // First basic validation (without confirmed rule)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/', // ✅ Only 10-digit numbers allowed
            ],
            'address' => 'nullable|string',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'adhar_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pan_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'phone.regex' => 'Phone number must be exactly 10 digits.',
            'email.unique' => 'This email is already registered.',
        ]);


        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()
                ->withErrors(['password' => 'Password and Confirm Password do not match.'])
                ->withInput();
        }

        if ($request->hasFile('avatar')) {
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->hasFile('adhar_image')) {
            $validatedData['adhar_image'] = $request->file('adhar_image')->store('adhar_images', 'public');
        }

        if ($request->hasFile('pan_image')) {
            $validatedData['pan_image'] = $request->file('pan_image')->store('pan_images', 'public');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        Employee::create($validatedData);

        // 👇 Redirect to Employee List page with success message
        return redirect()->route('employee.list')->with('success', 'Employee added successfully!');
    }


    public function EmployeeList()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10); // Show 10 per page
        return view('Employees.EmployeeList', compact('employees'));
    }


    // Show single employee (View)
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Employees.ViewEmployee', compact('employee'));
    }

    // Edit form
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('Employees.EditEmployee', compact('employee'));
    }

    // Update employee
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
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

        return redirect()->route('employee.list')->with('success', 'Employee updated successfully!');
    }

    // Delete employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.list')->with('success', 'Employee deleted successfully!');
    }


}
