<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
    @yield('styles_')
<body class="{{Route::getCurrentRoute()->getName() == 'profile' ? 'app sidebar-mini' : ''}}" > {{-- show the sidbar in profile view --}}

	@if(Route::getCurrentRoute()->getName() == 'profile')
		@include('partials.sidbar')
	@endif

	{{-- Checking flash messages --}}
	@if(Session::has('message'))
		<div id="session_message">{{Session::get('message')}}</div>
	@endif

	@if(Session::has('errorMessage'))
		<div id="session_errorMessage">{{Session::get('errorMessage')}}</div>
	@endif

    <div id="app">
    	@if(Route::getCurrentRoute()->getName() == 'profile')
        	@include('partials.headerAdmin')
        @else
        	@include('partials.header')
		@endif
        <main class="full-height py-4 @if(Route::getCurrentRoute()->getName() == 'profile') app-content @endif">
            @yield('content')
        </main>
    </div>
</body>
@include('partials.jsfiles')
@yield('jsfiles_')
</html>
