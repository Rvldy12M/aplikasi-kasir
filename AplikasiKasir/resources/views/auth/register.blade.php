<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Biru muda */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .register-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e90ff; /* Biru cerah */
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .input-group input:focus {
            border-color: #1e90ff;
            background-color: #e9f5ff;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #1e90ff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #4682b4;
        }

        .daftar-link {
            text-align: center;
            margin-top: 15px;
        }

        .daftar-link a {
            color: #1e90ff;
            text-decoration: none;
        }

        .daftar-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2>Register</h2>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="input-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="submit-btn">Register</button>
            </form>

            <div class="daftar-link">
                <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
            </div>

            @if(session('success'))
                <script>
                    alert('{{ session('success') }}');
                    window.location.href = '{{ url("/login") }}';
                </script>
            @endif
        </div>
    </div>
</body>
</html>
