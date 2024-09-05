<!DOCTYPE html>
<html lang="{{ $locale = \Laravel\Nova\Nova::resolveUserLocale(request()) }}"
      dir="{{ \Laravel\Nova\Nova::rtlEnabled() ? 'rtl' : 'ltr' }}" class="h-full font-sans antialiased">
<head>
    <meta name="theme-color" content="#fff">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width"/>
    <meta name="locale" content="{{ $locale }}"/>
    <meta name="robots" content="noindex">

    <title>{{ Nova::name() }}</title>

    @include('nova::partials.meta')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('app.css', 'vendor/nova') }}">

    <style>
        {{ Nova::brandColorsCSS() }}
    </style>

    <script>
        if (localStorage.novaTheme === 'dark' || (!('novaTheme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="min-w-site text-sm font-medium min-h-full text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-900">
@yield('content')
@stack('js')
</body>
</html>
