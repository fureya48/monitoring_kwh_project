<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Add Device</h1>
        {{-- @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif --}}
        <form action="{{ route('devices.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="device_name" class="form-label">Device Name</label>
                <input type="text" value="" name="device_name" class="form-control" required maxlength="25">
            </div>
            <div class="mb-3">
                <label for="code_device" class="form-label">Code Device</label>
                <input type="text" value="" name="code_device" class="form-control" required maxlength="10">
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" required maxlength="50">
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" required maxlength="50">
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Is Active</label>
                <select name='is_active' class="form-select" aria-label="Default select example" required>
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                </select>
            </div>
            @if(auth()->user()->role == "Admin")
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Add Devices</button>
            </div>
            @endif
            
        </form>
    </div> 
    </div>
</body>
</html>