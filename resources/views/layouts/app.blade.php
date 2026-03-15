<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sandip Ramanuj — Laravel Developer')</title>
    <meta name="description" content="Portfolio of Laravel Developer Sandip Ramanuj from Ahmedabad, Gujarat.">
    <meta name="theme-color" content="#0a0f1e">

    @production
        @php
            $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? '';
            $jsFile = $manifest['resources/js/app.js']['file'] ?? '';
        @endphp
        @if($cssFile)
            <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
        @endif
        @if($jsFile)
            <script src="{{ asset('build/' . $jsFile) }}" defer></script>
        @endif
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endproduction
</head>
<body class="min-h-screen bg-body text-slate-100 font-sans antialiased">
    <div id="app" class="relative">
        @yield('content')
    </div>
</body>
</html>