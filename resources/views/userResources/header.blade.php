<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Bank Przykład</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#uslugi">Usługi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontakt">Kontakt</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="/register">
                        @csrf
                        <input type="submit" />
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
