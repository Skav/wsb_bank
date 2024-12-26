@extends('user.resources.layout')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Wysyłanie Przelewów</h2>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form class="needs-validation" novalidate method="post" action="/sendTransfer">
                    @csrf
                    <div class="mb-3">
                        <label for="receiverName" class="form-label">Nazwa odbiorcy</label>
                        <input type="text" name="receiverName" id="receiverName" class="form-control" placeholder="Wprowadź nazwę odbiorcy" required>
                        <div class="invalid-feedback">To pole jest wymagane.</div>
                    </div>
                    @if($errors->has('receiverName'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('receiverName') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="accountNumber" class="form-label">Numer konta odbiorcy</label>
                        <input type="text" name="accountNumber" id="accountNumber" class="form-control" placeholder="Wprowadź numer konta" required>
                        <div class="invalid-feedback">To pole jest wymagane.</div>
                    </div>
                    @if($errors->has('accountNumber'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('accountNumber') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="transferAmount" class="form-label">Kwota przelewu (PLN)</label>
                        <input type="number" name="transferAmount" id="transferAmount" class="form-control" placeholder="Wprowadź kwotę" required>
                        <div class="invalid-feedback">Podaj prawidłową kwotę.</div>
                    </div>
                    @if($errors->has('transferAmount'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('transferAmount') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="transferTitle" class="form-label">Tytuł przelewu</label>
                        <input type="text" name="transferTitle" id="transferTitle" class="form-control" placeholder="Wprowadź tytuł przelewu" required>
                        <div class="invalid-feedback">To pole jest wymagane.</div>
                    </div>
                    @if($errors->has('transferTitle'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('transferTitle') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100">Wyślij przelew</button>
                </form>
                @if($errors->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('error') }}
                    </div>
                @endif
                @if($errors->has('success'))
                    <div class="alert alert-success text-center">
                        {{ $errors->first('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap form validation
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
@endsection
