@extends('adminResources.layout')

@section('content')
<div id="stworzUzytkownika" class="mb-5">
    <h2>Stwórz użytkownika</h2>
    <form>
        <div class="mb-3">
            <label for="nazwaUzytkownika" class="form-label">Nazwa użytkownika</label>
            <input type="text" id="nazwaUzytkownika" class="form-control" placeholder="Wprowadź nazwę użytkownika" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="Wprowadź e-mail" required>
        </div>
        <button type="submit" class="btn btn-danger">Dodaj</button>
    </form>
</div>

<div id="edytujUzytkownika" class="mb-5">
    <h2>Edytuj użytkownika</h2>
    <form>
        <div class="mb-3">
            <label for="wybierzUzytkownika" class="form-label">Wybierz użytkownika</label>
            <select id="wybierzUzytkownika" class="form-select">
                <option>TODO</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nowaNazwaUzytkownika" class="form-label">Nowa nazwa użytkownika</label>
            <input type="text" id="nowaNazwaUzytkownika" class="form-control" placeholder="Wprowadź nową nazwę">
        </div>
        <button type="submit" class="btn btn-danger">Zaktualizuj</button>
    </form>
</div>

<div id="usunUzytkownika" class="mb-5">
    <h2>Usuń użytkownika</h2>
    <form>
        <div class="mb-3">
            <label for="usunUzytkownikaSelect" class="form-label">Wybierz użytkownika</label>
            <select id="usunUzytkownikaSelect" class="form-select">
                <option>TODO</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Usuń</button>
    </form>
</div>

<div id="historiaTranzakcji">
    <h2>Historia transakcji</h2>
    <table class="table table-bordered">
        <thead class="table-danger">
        <tr>
            <th>#</th>
            <th>Data</th>
            <th>Użytkownik</th>
            <th>Kwota</th>
            <th>Typ transakcji</th>
        </tr>
        </thead>
        <tbody>
        TODO
        </tbody>
    </table>
</div>
@endsection
