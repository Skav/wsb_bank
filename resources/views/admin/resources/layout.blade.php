<!DOCTYPE html>
<html lang="pl">
<head>
    @include('resources.head')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('resources.sidebar')

        <!-- Główna zawartość -->
        <main class="col-md-9 col-lg-10 content">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
