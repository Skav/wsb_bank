<!DOCTYPE html>
<html lang="pl">
<head>
    @include('user.resources.head')
</head>
<body>
<!-- Nawigacja -->
@include('user.resources.header')

@yield(('content'))

<!-- Stopka -->
@include('user.resources.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
