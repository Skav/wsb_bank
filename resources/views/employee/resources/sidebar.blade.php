<nav class="navbar navbar-expand-lg navbar-dark bg-info flex-column flex-shrink-0 p-3" style="width: 200px; height: 100vh;">
    <a href="/employee" class="nav-item"><h4 class="text-white text-center mb-4">Panel Banku</h4></a>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item mb-2">
            <a href="/employee/showUsers" class="nav-link text-white">Lista Użytkowników</a>
        </li>
        <li class="nav-item mb-2">
            <a href="/employee/acceptUser" class="nav-link text-white">Zaakceptuj uzytkownikow</a>
        </li>
        <li class="nav-item mb-2">
            <a href="/employee/transactionHistory" class="nav-link text-white">Historia Transakcji</a>
        </li>
        <li class="nav-item mb-2">
            <a href="/employee/showMessages" class="nav-link text-white">
                <i class="bi bi-person-plus"></i> Sprawdz wiadomosci
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/employee/showAllMessages" class="nav-link text-white">
                <i class="bi bi-person-plus"></i> Sprawdz wszystkie wiadomosci
            </a>
        </li>
        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button class="nav-link text-white" >Wyloguj</button>
            </form>
        </li>
    </ul>
</nav>
