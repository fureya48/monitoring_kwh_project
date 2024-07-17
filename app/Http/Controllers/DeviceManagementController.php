<?php

namespace App\Http\Controllers;

use App\Models\device_managements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceManagementController extends Controller
{
    public function index()
    {
        return response()->json(device_managements::all(), 200);
    }

    public function show($id)
    {
        $deviceManagement = device_managements::find($id);

        if (is_null($deviceManagement)) {
            return response()->json(["message" => "Record not found"], 404);
        }
        return response()->json($deviceManagement, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_id' => 'required|uuid|exists:devices,id',
            'tegangan' => 'required|numeric',
            'arus' => 'required|numeric',
            'daya_aktif' => 'required|numeric',
            'daya_reaktif' => 'required|numeric',
            'daya_semu' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $deviceManagement = device_managements::create($request->all());
        return response()->json($deviceManagement, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'device_id' => 'required|uuid|exists:devices,id',
            'tegangan' => 'required|numeric',
            'arus' => 'required|numeric',
            'daya_aktif' => 'required|numeric',
            'daya_reaktif' => 'required|numeric',
            'daya_semu' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $deviceManagement = device_managements::find($id);

        if (is_null($deviceManagement)) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $deviceManagement->update($request->all());

        return response()->json($deviceManagement, 200);
    }
}
