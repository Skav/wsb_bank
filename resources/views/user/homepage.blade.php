@extends('user.resources.layout')

@section('content')

    <header class="bg-light text-center py-5">
        <div class="container">
            <h1 class="display-4">Witamy w Banku WSB</h1>
            <p class="lead">Twoje finanse, Twoje bezpieczeństwo.</p>
            <a href="#uslugi" class="btn btn-primary btn-lg">Dowiedz się więcej</a>
        </div>
    </header>

    <section id="uslugi" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Nasze usługi</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Konta osobiste</h5>
                            <p class="card-text">Otwórz konto i zarządzaj swoimi finansami w prosty sposób.</p>
                            <a href="/konta_osobiste" class="btn btn-primary">Więcej</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Kredyty</h5>
                            <p class="card-text">Skorzystaj z naszych atrakcyjnych ofert kredytowych.</p>
                            <a href="/kredyty" class="btn btn-primary">Więcej</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Inwestycje</h5>
                            <p class="card-text">Pomnażaj swoje oszczędności dzięki naszym funduszom inwestycyjnym.</p>
                            <a href="/inwestycje" class="btn btn-primary">Więcej</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontakt" class="bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Skontaktuj się z nami</h2>
            <p class="mb-4">Jesteśmy tutaj, aby Ci pomóc!</p>
            <form method="post" action="/sendMessage">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="sender_name" placeholder="Twoje imię" required>
                </div>
                @if($errors->has('sender_name'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('sender_name') }}
                    </div>
                @endif
                <div class="mb-3">
                    <input type="email" class="form-control" name="sender_email" placeholder="Twój e-mail" required>
                </div>
                @if($errors->has('sender_name'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('sender_name') }}
                    </div>
                @endif
                <div class="mb-3">
                    <textarea class="form-control" rows="5" name="sender_message" placeholder="Twoja wiadomość"></textarea>
                </div>
                @if($errors->has('sender_name'))
                    <div class="alert alert-danger text-center">
                        {{ $errors->first('sender_name') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Wyślij</button>
            </form>
        </div>
        @if($errors->has('success'))
            <div class="alert alert-success text-center">
                {{ $errors->first('success') }}
            </div>
        @endif
        @if($errors->has('error'))
            <div class="alert alert-danger text-center">
                {{ $errors->first('error') }}
            </div>
        @endif
    </section>

@endsection
