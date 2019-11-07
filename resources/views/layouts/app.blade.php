<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
    @yield('styles_')
<body>
    <div id="app">
        @include('partials.header')
        <main class="full-height py-4">
            @yield('content')
        </main>
    </div>
</body>
@include('partials.jsfiles')
@yield('jsfiles_')
</html>
