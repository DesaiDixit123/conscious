<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // your login blade file
    }

    // Login logic
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Hardcoded admin credentials
        $adminEmail = 'admin@gmail.com';
        $adminPassword = 'admin123';

        // Check for Admin
        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            session([
                'admin_logged_in' => true,
                'admin_email' => $request->email
            ]);

            return redirect()->route('dashboard');
        }

        // Check for Employee
        $employee = Employee::where('email', $request->email)->first();

        if ($employee && Hash::check($request->password, $employee->password)) {
            session([
                'employee_logged_in' => true,
                'employee_id' => $employee->id,
                'employee_name' => $employee->name,
                'employee_email' => $employee->email,
            ]);

            return redirect()->route('dashboard'); // Create this route and view
        }

        return back()->with('error', 'Invalid credentials.');
    }

    // Dashboard page
  public function dashboard()
{
    if (!session('admin_logged_in') && !session('employee_logged_in')) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    // You can also load different views based on role
    if (session('admin_logged_in')) {
        return view('admin.dashboard'); // admin view
    } elseif (session('employee_logged_in')) {
        return view('admin.dashboard'); // employee view (create this)
    }
}

    // Logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
