<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - Panel Administracyjny</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8d7da;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border: 1px solid #dc3545;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-card .btn-danger {
            width: 100%;
        }
        .login-card h2 {
            color: #dc3545;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="login-card">
    <h2>Panel Administracyjny</h2>
    <form>
        <div class="mb-3">
            <label for="username" class="form-label">Nazwa użytkownika</label>
            <input type="text" id="username" class="form-control" placeholder="Wprowadź nazwę użytkownika" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" id="password" class="form-control" placeholder="Wprowadź hasło" required>
        </div>
        <button type="submit" class="btn btn-danger">Zaloguj się</button>
    </form>
    <div class="text-center mt-3">
        <a href="#" class="text-danger">Zapomniałeś hasła?</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
