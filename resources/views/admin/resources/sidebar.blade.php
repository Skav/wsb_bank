<!-- Sidebar -->
<nav class="col-md-2 col-lg-2 d-md-block sidebar py-1">
    <a class="nav-item" href="/admin"><h3 class="text-center mb-4">Admin Panel</h3></a>
    <ul class="nav flex-column">
        <li class="nav-item mb-3">
            <a href="/admin/showUsers" class="nav-link">
                <i class="bi bi-person-plus"></i> Pokaż użytkowników
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="/admin/addUser" class="nav-link">
                <i class="bi bi-person-plus"></i> Dodaj użytkownika
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="/admin/acceptUser" class="nav-link">
                <i class="bi bi-person-plus"></i> Zaakceptuj użytkowników
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="/admin/transactionHistory" class="nav-link">
                <i class="bi bi-person-plus"></i> Historia tranzakcji
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="/admin/showMessages" class="nav-link">
                <i class="bi bi-person-plus"></i> Sprawdz wiadomosci
            </a>
        </li>
        <li class="nav-item mb-3">
            <a href="/admin/showAllMessages" class="nav-link">
                <i class="bi bi-person-plus"></i> Sprawdz wszystkie wiadomosci
            </a>
        </li>
        <li class="nav-item">
            <form action="/admin/logout" method="post">
                @csrf
                <button class="nav-link text-white" href="/admin/logout">Wyloguj</button>
            </form>
        </li>
    </ul>
</nav>
