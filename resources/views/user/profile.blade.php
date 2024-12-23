@extends('user.resources.layout')

@section('content')

    <main class="container my-4 flex-grow-1">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Profil" class="rounded-circle mb-3">
                        <h5 class="card-title">Jan Kowalski</h5>
                        <p class="card-text">jan.kowalski@example.com</p>
                        <a href="#" class="btn btn-primary w-100">Edytuj profil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Podsumowanie konta</div>
                    <div class="card-body">
                        <h6>Saldo:</h6>
                        <p class="text-success fs-4">12 345,67 PLN</p>

                        <h6>Ostatnie transakcje:</h6>
                        <ul class="list-group">
                            <li class="list-group-item">Przelew do Piotr Nowak - 500,00 PLN</li>
                            <li class="list-group-item">Wpłata - 1 000,00 PLN</li>
                            <li class="list-group-item">Zakup: Sklep XYZ - 123,45 PLN</li>
                        </ul>
                        <a href="#" class="btn btn-link mt-3">Zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
