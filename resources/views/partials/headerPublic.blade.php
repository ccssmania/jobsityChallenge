  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">Salazar & Salazar {{env('DOMAIN_NAME')}} </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menú
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(Route::currentRouteName() == 'public') ? url('/services') : '#services'}}">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(Route::currentRouteName() == 'public') ? url('/portfolio') : '#portfolio'}}">Portafolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(Route::currentRouteName() == 'public') ? url('/about') : '#about'}}">Sobre Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(Route::currentRouteName() == 'public') ? url('/about') : '#team'}}">Equipo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(Route::currentRouteName() == 'public') ? url('/contact') : '#contact'}}">Contactanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach($banners as $banner)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
      @foreach($banners as $banner)
        <div class="carousel-item  {{ $loop->first ? 'active' : '' }}">
          @if(Browser::isMobile())
            <header class="masthead" style="background-image: url({{url('/images/m-large/banner_'.$banner->id.'.webp')}}) ">
          @elseif(Browser::isTablet())
            <header class="masthead" style="background-image: url({{url('/images/x-large/banner_'.$banner->id.'.webp')}}) ">
          @elseif(Browser::isDesktop())

            <header class="masthead" style="background-image: url({{url('/images/banner/banner_'.$banner->id.'.webp')}}) ">
          @else
            <header class="masthead" style="background-image: url({{url('/images/x-large/banner_'.$banner->id.'.webp')}}) ">
          @endif
          
            <div class="container">
              <div class="intro-text text-info">
                <div class="intro-lead-in">{{$banner->name}}</div>
                <div class="intro-heading text-light">{!! $banner->description!!}</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{isset($banner->link) ? '$banner->link' : '#services'}}">{{isset($banner->link) ? 'Ver' : 'Servicios'}} </a>
              </div>
            </div>
          </header>
        </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>