<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('services.Services', compact('services'));
    }

    public function create()
    {
        return view('services.Services');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('service_images', 'public');
        }

        Service::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('services.index')->with('success', 'Service added successfully.');
    }




    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $service = Service::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $imagePath = $request->file('image')->store('service_images', 'public');
            $service->image = $imagePath;
        }

        $service->name = $request->name;
        $service->save();

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
    public function getServiceNames()
{
    $serviceNames = Service::pluck('name'); // only name column fetch kare
    return response()->json($serviceNames);
}

}
