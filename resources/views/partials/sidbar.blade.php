<aside class="app-sidebar" id="app_notifications">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar responsive-avatar" src="{{url('/images/small/user_'.$user->id.'.webp')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="User Image">
		<div>
			<p class="app-sidebar__user-name">{{$user->name}}</p>
			<p class="app-sidebar__user-designation">Tweets By {{ $user->twitter_username }}</p>
		</div>
	</div>
	<ul class="app-menu">
		<script src="//platform.twitter.com/widgets.js"></script>{{-- Loading twttr  widgets --}}
		@foreach($tweets as $tweet)
			<li>
				@can('update-tweet',$user->id) 
					@if($noShowTweets->contains($tweet->id))
						<a href="#" class="btn btn-link hideTweet" title="Show this tweet" data-alert="show" data-url="/tweets/show/" data-user-id="{{ $user->id }}" data-tweet-id="{{ $tweet->id }}" >Show</a>
					@else
						<a href="#" class="btn btn-link hideTweet" title="Hide this tweet" data-alert="hide" data-url="/tweets/hide/" data-user-id="{{ $user->id }}" data-tweet-id="{{ $tweet->id }}" >Hide</a>
					@endif
				@endcan
				@if(!$noShowTweets->contains($tweet->id) or (\Auth::check() and $user->id == \Auth::user()->id)) {{-- if the tweet is hidden just the owner can see it --}}
					<div class='grid-item'><div id='container-{{ $tweet->id }}'></div></div>{{-- embed tweet using $tweet->id  --}}

					<script type="text/javascript">
						twttr.widgets.createTweet('{{ $tweet->id }}', document.getElementById('container-{{ $tweet->id }}'));
					</script>
				@endif
			</li>
		@endforeach

	</ul>
</aside>