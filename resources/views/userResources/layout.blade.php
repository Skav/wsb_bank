<!DOCTYPE html>
<html lang="pl">
<head>
    @include('userResources.head')
</head>
<body>
<!-- Nawigacja -->
@include('userResources.header')

@yield(('content'))

<!-- Stopka -->
@include('userResources.footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
