@extends('layouts.app')

@section('content')
	
	<div class="container bg-light">
		@foreach($entries as $entry){{-- each row represent each user ($entry->user) --}}
			<div class="row row-height">
				@foreach($entry->user->entries->take(3) as $ent) {{-- we just take the las three entries of each user  --}}
					<div class="col-md-4 entries-height">
						<div class="card h-100">
							<div class="card-header bg-dark text-center text-light ">
								<div class="links">
									<a href="{{ url('/profile/'.$entry->user->id) }}" >
										{{ $entry->user->name }}
									</a>
								</div>
								@can('update', $ent)
									<a class="link-edit pr-3 pt-2" href="{{ url('/entries/edit/'.$ent->id) }}"> Edit </a>
								@endcan
							</div>
							<div class="card-body inline">
								<h3 class="card-title"><a href="{{ url('/entries/show/'.$ent->id) }}">{{ $ent->title }}</a> </h3>
								{!! $ent->content !!}
							</div>
							<div class="card-footer">
								<small class="text-muted">{{ $ent->created_at->diffForHumans() }}</small>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
	</div>

@endsection