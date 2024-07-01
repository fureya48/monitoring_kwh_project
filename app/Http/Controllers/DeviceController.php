<?php

namespace App\Http\Controllers;

use App\Models\device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

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
        try{
            $device = $request->all();

            $rules = [
                'device_name'=> 'required|string|max:25',
                'code_device'=> 'required|string|max:10',
                'longitude'=> 'required|string|max:50',
                'latitude'=> 'required|string|max:50',
                'is_active' => 'required|boolean',
            ];

            $message = [
                'required' => 'Input :attribute wajib diisi',
                'device_name'=> 'Nama device tidak boleh kosong',
                'code_device'=> 'Code device tidak boleh kosong',
                'longitude'=> 'Longitude tidak boleh kosong',
                'latitude'=> 'Latitude tidak boleh kosong',
                'is_active' => 'Status aktif wajib diisi',
            ];

            Validator::make($device, $rules, $message)->validate();

            $newDevice = new device();
            $newDevice->uuid = Str::uuid()->toString();
            $newDevice->device_name = $device['device_name'];
            $newDevice->code_device = $device['code_device'];
            $newDevice->longitude = $device['longitude'];
            $newDevice->latitude = $device['latitude'];
            $newDevice->is_active = $device['is_active'];
            $newDevice->save();

            Alert::success("Success", "Device berhasil ditambahkan");
        return redirect('/devices');
        }catch (\Illuminate\Database\QueryException $e) {
            if($e->errorInfo[1] == 1062) {
                Alert::error("Error", "Kode device sudah digunakan. Silakan gunakan kode device yang lain.");
                return redirect()->back()->withInput();
            } else {
                throw $e;
            }
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        Alert::success('Success', 'User Berhasil Dihapus');
        return redirect()->route('devices.index');
    }

    public function editDevices($id)
    {
        $device = Device::findOrFail($id);
        return view('devices.edit_Device', compact('device'));
    }

    public function update(Request $request, $id)
    {
        try {
            $device = $request->all();

            $rules = [
                'device_name' => 'required|string|max:25',
                'code_device' => 'required|string|max:10|unique:devices,code_device,' . $id,
                'longitude' => 'required|string|max:50',
                'latitude' => 'required|string|max:50',
                'is_active' => 'required|boolean',
            ];

            $messages = [
                'required' => 'Input :attribute wajib diisi',
                'device_name.required' => 'Nama device tidak boleh kosong',
                'code_device.required' => 'Kode device tidak boleh kosong',
                'code_device.unique' => 'Kode device sudah digunakan',
                'longitude.required' => 'Longitude tidak boleh kosong',
                'latitude.required' => 'Latitude tidak boleh kosong',
                'is_active.required' => 'Status aktif wajib diisi',
            ];

            Validator::make($device, $rules, $messages)->validate();

            $existingDevice = Device::findOrFail($id);
            $existingDevice->device_name = $device['device_name'];
            $existingDevice->code_device = $device['code_device'];
            $existingDevice->longitude = $device['longitude'];
            $existingDevice->latitude = $device['latitude'];
            $existingDevice->is_active = $device['is_active'];
            $existingDevice->save();

            Alert::success("Success", "Device berhasil diperbarui");
            return redirect('/devices');
        } catch (\Illuminate\Database\QueryException $e) {
            if($e->errorInfo[1] == 1062) {
                Alert::error("Error", "Kode device sudah digunakan. Silakan gunakan kode device yang lain.");
                return redirect()->back()->withInput();
            } else {
                throw $e;
            }
        } catch (\Throwable $th) {
            Alert::error("Error", "Terjadi kesalahan saat memperbarui device: " . $th->getMessage());
            return redirect()->back()->withInput();
        }
    }
}

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
