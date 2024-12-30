@extends('admin.resources.layout')

@section('content')
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Lista Użytkowników</h5>
                    <p class="card-text">Przeglądaj i zarządzaj użytkownikami.</p>
                    <a href="/admin/showUsers" class="btn btn-primary">Przejdź</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Dodaj Użytkownika</h5>
                    <p class="card-text">Dodaj nowego uzytkownika.</p>
                    <a href="/admin/addUser" class="btn btn-primary">Przejdź</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Historia Transakcji</h5>
                    <p class="card-text">Sprawdzaj historię przelewów i operacji.</p>
                    <a href="/admin/transactionHistory" class="btn btn-primary">Przejdź</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Akceptacja Użytkownika</h5>
                    <p class="card-text">Zaakceptuj nowych użytkowników.</p>
                    <a href="/admin/showUsers" class="btn btn-primary">Przejdź</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
