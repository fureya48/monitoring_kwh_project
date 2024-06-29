<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Devices</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <a href="{{ route('devices.createForm') }}" class="btn btn-primary mb-3">Add Device</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Device Name</th>
            <th scope="col">Code Divece</th>
            <th scope="col">Longitude</th>
            <th scope="col">Latitude</th>
            <th scope="col">Is Active</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($devices as $device)
          <tr>
            <th scope="row">{{ $device->id }}</th>
            <td>{{ $device->device_name }}</td>
            <td>{{ $device->code_device }}</td>
            <td>{{ $device->longitude }}</td>
            <td>{{ $device->latitude }}</td>
            <td>{{ $device->is_active ? 'Yes' : 'No' }}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
</body>
</html>