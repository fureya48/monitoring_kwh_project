<?php

namespace App\Http\Controllers;

use App\Models\device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('devices.table_device', compact('devices'));
    }

    public function createForm()
    {
        return view('devices.add_device');
    }
    
    public function store(Request $request)
    {
        $dataDevice = $request->all();
        $newDevice = new device();
        $newDevice->device_name = $dataDevice['device_name'];
        $newDevice->code_device = $dataDevice['code_device'];
        $newDevice->longitude = $dataDevice['longitude'];
        $newDevice->latitude = $dataDevice['latitude'];
        $newDevice->is_active = $dataDevice['is_active'];
        $newDevice->save();

        // $data =$request->all();
        //     $newUser = new User();
        //     $newUser->name = $data["name"];
        //     $newUser->email = $data["email"];
        //     $newUser->password = Hash::make($data["password"]);
        //     $newUser->role = $data["role"];
        //     $newUser->save();
        // $request->validate([
        //     'device_name' => 'required|string|max:25',
        //     'code_device' => 'required|string|max:10|unique:devices',
        //     'longitude' => 'required|string|max:50',
        //     'latitude' => 'required|string|max:50',
        //     'is_active' => 'required|boolean',
        // ]);

        // Device::create([
        //     'device_name' => $request->device_name,
        //     'code_device' => $request->code_device,
        //     'longitude' => $request->longitude,
        //     'latitude' => $request->latitude,
        //     'is_active' => $request->is_active,
        // ]);
        // $request->save();

        return redirect()->route('devices.index')->with('success', 'Device added successfully.');
    }
}
