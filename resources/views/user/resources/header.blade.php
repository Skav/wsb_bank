<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">WSB Bank</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sendTransfer">Wyśli przelew</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/showTransactions">Historia przelewow</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link" href="/logout">Wyloguj</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link active" href="/">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#uslugi">Usługi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#kontakt">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Zaloguj sie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Stworz konto</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
