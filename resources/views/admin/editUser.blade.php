@extends('admin.resources.layout')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Edycja Użytkownika</h2>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                @if($errors->has('info'))
                    <div class="alert alert-info text-center">
                        {{ $errors->first('info') }}
                    </div>
                @endif
                <form class="needs-validation" novalidate method="post" action="/admin/editUser/{{ $user->id }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Imię</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Wprowadź imie" required value="{{ $user->name }}">
                        <div class="invalid-feedback">To pole jest wymagane.</div>
                    </div>
                    @if($errors->has('name'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="surname" class="form-label">Nazwisko</label>
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Wprowadź nazwisko" required value="{{ $user->surname }}">
                        <div class="invalid-feedback">To pole jest wymagane.</div>
                    </div>
                    @if($errors->has('surname'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('surname') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="age" class="form-label">Wiek</label>
                        <input type="number" id="age" name="age" class="form-control" placeholder="Wprowadź wiek" required value="{{ $user->age }}">
                        <div class="invalid-feedback">Podaj prawidłowy wiek.</div>
                    </div>
                    @if($errors->has('age'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('age') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label">Adres email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Wprowadź adres email" required value="{{ $user->email }}">
                        <div class="invalid-feedback">Podaj prawidłowy adres email.</div>
                    </div>
                    @if($errors->has('email'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('email') }}
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
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Wprowadź numer telefonu" required value="{{ $user->phone }}">
                        <div class="invalid-feedback">Podaj prawidłowy numer telefonu.</div>
                    </div>
                    @if($errors->has('phone'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="gender" class="form-label">Wybierz płeć</label><br/>
                        <input type="radio" id="gender-male" class="form-radio" placeholder="Meżczyzna" value="male" name="gender" @if($user->gender == "male") checked @endif >
                        <label for="gender-male" class="form-label">Meżczyzna</label>
                        <input type="radio" id="gender-female" class="form-radio" placeholder="Kobieta" value="female" name="gender" @if($user->gender == "female") checked @endif >
                        <label for="gender-female" class="form-label">Kobieta</label>
                    </div>
                    @if($errors->has('gender'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('gender') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="rank_id" class="form-label">Wybierz range</label><br/>
                        <select class="form-select" name="rank_id">
                            @foreach($ranks as $rank)
                                <option value="{{ $rank->id }}" @if($rank->id == $user->rank_id) selected @endif>{{ $rank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="active" class="form-label">Aktywowac uzytkownika?</label>
                        <input type="checkbox" id="active" name="active" @if($user->active) checked @endif>
                        <div class="invalid-feedback">Podaj prawidłowy numer telefonu.</div>
                    </div>
                    @if($errors->has('active'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('active') }}
                        </div>
                    @endif
                    @if($errors->has('rank_id'))
                        <div class="alert alert-danger text-center">
                            {{ $errors->first('rank') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100">Zapisz zmiany</button>
                </form>
                @if($errors->has('error'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
