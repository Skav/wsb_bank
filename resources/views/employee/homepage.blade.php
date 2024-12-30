@extends('employee.resources.layout')

@section('content')
    <div class="container-fluid py-5">
        <h2 class="text-center mb-4">Panel Pracownika Banku</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lista Użytkowników</h5>
                        <p class="card-text">Przeglądaj i zarządzaj użytkownikami.</p>
                        <a href="#" class="btn btn-primary">Przejdź</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Zaakceptuj użytkowników</h5>
                        <p class="card-text">Zaakceptuj nowych użytkownikow.</p>
                        <a href="#" class="btn btn-primary">Przejdź</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Historia Transakcji</h5>
                        <p class="card-text">Sprawdzaj historię przelewów i operacji.</p>
                        <a href="#" class="btn btn-primary">Przejdź</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
