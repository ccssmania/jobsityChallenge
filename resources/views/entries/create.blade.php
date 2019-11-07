@extends('layouts.app')
{{-- Extra styles an js --}}
@section('styles_')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
@endsection
@section('jsfiles_')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.min.js"></script>
	<script src="{{ url('js/summerNotes.js') }}"></script>
@endsection
@section('content')
	<div class="mt-5">
		@include('entries.form', ['url' => url('/entries/create'), 'method' => 'POST'])
	</div>
@endsection