<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.webp') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.webp') }}">
    @yield('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles-2.css') }}">
    
    <meta name="google-site-verification" content="gaK8n0EmDCbSb9IofNtbFxQjOOq7vQ0kIlG5SYRM_i4" />
</head>

<body>
    @include('layouts.parts.header')

    @yield('content')

    @if ($page->title ?? '')
    <a href="https://wa.lawfirm-jlc.com/?kebutuhan={{ $page->title ?? '' }}" class="floating-wa-mini" target="_blank">
        <i class="bi bi-whatsapp"></i>
        <span>Konsultasi Gratis</span>
    </a>
    @else
    <a href="https://wa.lawfirm-jlc.com/" class="floating-wa-mini" target="_blank">
        <i class="bi bi-whatsapp"></i>
        <span>Konsultasi Gratis</span>
    </a>
    @endif

    @include('layouts.parts.footer')
    
</body>

</html>
