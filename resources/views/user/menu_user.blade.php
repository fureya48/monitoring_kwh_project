<!DOCTYPE html>
<html>
<head>
    <title>Menu User</title>
</head>
<body>
    <h1>Menu User</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <!-- Tombol untuk menambahkan user baru -->
    <a href="{{ route('users.createForm') }}">
        <button name="submit" type="submit" class="btn btn-primary">Add User</button>
    </a>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="" name="email" class="form-control" required maxlength="25">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>

</body>
</html>
