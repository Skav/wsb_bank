@extends("user.resources.layout")

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-sm border-0" style="max-width: 500px; width: 100%;">
        <div class="card-body p-4">
            <h2 class="card-title text-center text-dark mb-4">Rejestracja</h2>
            <form class="needs-validation" novalidate method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Imię</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Wprowadź swoje imię" required>
                    <div class="invalid-feedback">To pole jest wymagane.</div>
                </div>
                @if($errors->has('name'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="surname" class="form-label">Nazwisko</label>
                    <input type="text" id="surname" name="surname" class="form-control" placeholder="Wprowadź swoje nazwisko" required>
                    <div class="invalid-feedback">To pole jest wymagane.</div>
                </div>
                @if($errors->has('surname'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('surname') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Wprowadź swój e-mail" required>
                    <div class="invalid-feedback">Wprowadź poprawny adres e-mail.</div>
                </div>
                @if($errors->has('email'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Wprowadź numer telefonu" required>
                    <div class="invalid-feedback">Wprowadź poprawny numer telefonu.</div>
                </div>
                @if($errors->has('phone'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="age" class="form-label">Wiek</label>
                    <input type="number" id="age" name="age" class="form-control" placeholder="Podaj swoj wiek" required>
                    <div class="invalid-feedback">Podaj prawidlowy wiek.</div>
                </div>
                @if($errors->has('age'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="password" class="form-label">Hasło</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Wprowadź hasło" required>
                    <div class="invalid-feedback">Wprowadź hasło.</div>
                </div>
                @if($errors->has('password'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Potwierdź hasło</label>
                    <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Potwierdź hasło" required>
                    <div class="invalid-feedback">Potwierdź swoje hasło.</div>
                </div>
                @if($errors->has('confirm_password'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('confirm_password') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Wybierz płeć</label><br/>
                    <input type="radio" id="gender-male" class="form-radio" placeholder="Meżczyzna" value="male" name="gender" checked>
                    <label for="gender-male" class="form-label">Meżczyzna</label>
                    <input type="radio" id="gender-female" class="form-radio" placeholder="Kobieta" value="female" name="gender" >
                    <label for="gender-female" class="form-label">Kobieta</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Zarejestruj się</button>
            </form>
            @if($errors->has('created'))
                <div class="alert alert-success text-center">
                    {{ $errors->first('created') }}
                </div>
            @endif
            <div class="text-center mt-3">
                <p class="mb-0">Masz już konto? <a href="/login" class="text-primary">Zaloguj się</a></p>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

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
@endsection()
