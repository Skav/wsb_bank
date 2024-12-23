<!DOCTYPE html>
<html lang="pl">
<head>
    @extends('admin.resources.head')
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
<div class="card shadow-sm border-0" style="max-width: 500px; width: 100%;">
    <div class="card-body p-4">
        <h2 class="card-title text-center text-dark mb-4">Logowanie Administratora</h2>
        <form class="needs-validation" novalidate method="post" action="/admin/login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Nazwa użytkownika</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Wprowadź email" required>
                <div class="invalid-feedback">To pole jest wymagane.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Wprowadź hasło" required>
                <div class="invalid-feedback">Wprowadź hasło.</div>
            </div>
            <button type="submit" class="btn btn-danger w-100">Zaloguj się</button>
        </form>
        @if($errors->has('error'))
            <div class="alert alert-danger text-center">
                {{ $errors->first('error') }}
            </div>
        @endif
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Bootstrap form validation
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>
