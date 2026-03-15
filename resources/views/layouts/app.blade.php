<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sandip Ramanuj — Laravel Developer')</title>
    <meta name="description" content="Portfolio of Laravel Developer Sandip Ramanuj from Ahmedabad, Gujarat. Backend engineering, REST APIs, automation, and scalable Laravel applications.">
    <meta name="theme-color" content="#0d0d0d">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-body text-slate-100 font-sans antialiased">
    <div id="app" class="relative">
        @yield('content')
    </div>
</body>
</html>

