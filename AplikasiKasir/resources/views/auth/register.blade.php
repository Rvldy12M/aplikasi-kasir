<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>Role:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
        <br>
        <button type="submit">Register</button>
    </form>
    @if(session('success'))
        <script>
            alert('{{ session('success') }}');
            window.location.href = '{{ url("/login") }}';
        </script>
    @endif
</body>
</html>
