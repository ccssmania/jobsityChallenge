@extends('layouts.app')

@section('content')
	<div class="container bg-light">
		<div class="row py-5">
			@foreach($entries as $entry)
				<div class="col-md-4 entries-height">
					<div class="card h-100">
						<div class="card-header bg-dark text-center text-light ">
							<div class="links">
								<a href="{{ url('/profile/'.$entry->user->id) }}" >
									{{ $entry->user->name }}
								</a>
							</div>
							@can('update', $entry)
								<a class="link-edit pr-3 pt-2" href="{{ url('/entries/'.$entry->id.'/edit') }}"> Edit </a>
							@endcan
						</div>
						<div class="card-body inline">
							<h3 class="card-title"><a href="{{ url('/profile/'.$entry->id.'/'.$entry->user->id) }}">{{ $entry->title }}</a> </h3>
							{!! $entry->content !!}
						</div>
						<div class="card-footer">
							<small class="text-muted">{{ $entry->created_at->diffForHumans() }}</small>
						</div>
					</div>
				</div>
			@endforeach
				{{ $entries->onEachSide(1)->links() }}
		</div>
	</div>
@endsection