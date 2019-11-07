<aside class="app-sidebar" id="app_notifications">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar responsive-avatar" src="{{url('/images/small/user_'.Auth::user()->id.'.webp')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" alt="User Image">
		<div>
			<p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
			<p class="app-sidebar__user-designation">{{Auth::user()->rol->name}}</p>
		</div>
	</div>
	<ul class="app-menu">


		<!-- ************************************** Dashboard *******************************************************************-->


		@if(\Auth::user()->rol->name === 'Administrador')
		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'dashboard' ? 'active' : ''}}" href="{{url('/')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
		</li>
		@endif

		<!-- ************************************** Tasks *******************************************************************-->



		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'task' ? 'active' : ''}}" href="{{url('/tasks')}}"><i class="app-menu__icon fas fa-calendar"></i><span class="app-menu__label">Tareas</span></a>
		</li>



		<!-- ************************************** Tasks *******************************************************************-->


		@can('viewAny', App\Accounting::class)
		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'accounting' ? 'active' : ''}}" href="{{url('/accountings')}}"><i class="app-menu__icon fa fa-calculator"></i><span class="app-menu__label">Contabilidad</span></a>
		</li>
		@endcan


		<!-- ************************************** Tasks *******************************************************************-->


		@can('viewAny', App\Harvest::class)
		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'harvest' ? 'active' : ''}}" href="{{url('/harvests')}}"><i class="app-menu__icon fa icon-avocado"></i><span class="app-menu__label">Cosechas</span></a>
		</li>
		@endcan

		<!-- ************************************** Profile *******************************************************************-->

		<li>
			<a class="app-menu__item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'profile' ? 'active' : ''}}" href="{{url('/profile/0')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Perfil</span></a>
		</li>

		<!-- ************************************** Products *******************************************************************-->

		@can('viewAny', App\Product::class)
		<li class="treeview {{Route::getCurrentRoute()->getName() == 'products' ? 'is-expanded' : ''}}">
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'products' ? 'active' : ''}}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Productos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{url('/products')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'products' ? 'active' : ''}}"><i class="icon fa fa-circle-o"></i> Productos </a></li>
				<li><a href="{{url('/product_category')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'product_category' ? 'active' : ''}}"><i class="icon fa fa-circle-o"></i> Categorías del producto </a></li>
			</ul>
		</li>
		@endcan

		<!-- ************************************** Templates *******************************************************************-->

		@can('viewAny', App\Template::class)
		<li>
			<a class="app-menu__item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'templates' ? 'active' : ''}}" href="{{url('/templates')}}">
				<i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Plantillas</span>
			</a>
		</li>
		@endcan

		<!-- ************************************** Rols *******************************************************************-->


		@can('viewAny', App\Rol::class)
		<li>
			<a class="app-menu__item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'rol' ? 'active' : ''}}" href="{{url('/rol')}}">
				<i class="app-menu__icon fas fa-brain"></i><span class="app-menu__label">Roles</span>
			</a>
		</li>
		@endcan

		<!-- ************************************** Notifications *******************************************************************-->


		<li>
			<a class="app-menu__item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'notifications' ? 'active' : ''}}" href="{{url('/notifications')}}"><i data-count="{{$unread}}" class="app-menu__icon fa fa-bell {{$unread > 0 ? 'notification-icon' :''}} "></i><span class="app-menu__label">Notificaciones</span></a>
		</li>


		<!-- **************************************  Farm  *******************************************************************-->
		@can('viewAny', App\Farm::class)
		<li class="treeview {{Route::getCurrentRoute()->getName() == 'farm' ? 'is-expanded' : ''}}">
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'farm' ? 'active' : ''}}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-tractor"></i><span class="app-menu__label">Fincas Y Otros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{url('/farms')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'farms' ? 'active' : ''}}"><i class="icon fas fa-tractor"></i> Fincas </a></li>
				<li><a href="{{url('/batches')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'batches' ? 'active' : ''}}"><i class="icon fas fa-tree"></i> Lotes </a></li>
				<li><a href="{{url('/reseeds')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'reseeds' ? 'active' : ''}}"><i class="icon fas fa-recycle"></i> Resiembras </a></li>
				<li><a href="{{url('/ages')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'ages' ? 'active' : ''}}"><i class="icon fas fa-seedling"></i> Edades </a></li>
				<li><a href="{{url('/measurements')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'measurements' ? 'active' : ''}}"><i class="icon fas fa-weight"></i> Medidas </a></li>
			</ul>
		</li>
		@endcan
		<!-- ************************************** ING Mandatories ********************************************************-->
		@can('viewAny', App\IngMandatory::class)
		<li>
			<a class="app-menu__item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'mandatories' ? 'active' : ''}}" href="{{url('/mandatories')}}"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Observaciones del ING</span>
			</a>
		</li>
		@endcan

		<!-- ************************************** Enforcements ********************************************************-->

	
		@can('viewAny', App\Enforcement::class)
		<li class="treeview {{Route::getCurrentRoute()->getName() == 'enforcement' ? 'is-expanded' : ''}}">
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'enforcements' ? 'active' : ''}}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shower"></i><span class="app-menu__label">Aplicaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li>
					<a href="{{url('/enforcements')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'enforcements' ? 'active' : ''}}"><i class="icon fa fa-shower"></i> Aplicaciones </a>
				</li>
				<li>
					<a href="{{url('/enforcement_categories')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'enforcement_categories' ? 'active' : ''}}"><i class="icon fa fa-th-list"></i> Categorías de aplicación
					</a>
				</li>
			</ul>
		</li>
		@endcan

		<!-- ************************************** Inventory *******************************************************************-->


		@can('viewAny', App\Inventory::class)
		<li class="treeview {{Route::getCurrentRoute()->getName() == 'inventory' ? 'is-expanded' : ''}}">
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'inventory' ? 'active' : ''}}" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-boxes"></i><span class="app-menu__label">Bodega</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li>
					<a href="{{url('/inventories')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'inventories' ? 'active' : ''}}"><i class="icon fas fa-book-open"></i> Inventario </a>
				</li>
				<li>
					<a href="{{url('/stocks')}}" class="treeview-item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'stocks' ? 'active' : ''}}"><i class="icon fas fa-box-open"></i> Bodega
					</a>
				</li>
			</ul>
		</li>
		@endcan
		
		<!-- ************************************** Chat *******************************************************************-->

		<li class="treeview {{Route::getCurrentRoute()->getName() == 'chat' ? 'is-expanded' : ''}}">
			<a class="app-menu__item {{explode('/', Route::getCurrentRoute()->uri())[0] == 'chat' ? 'active' : ''}}" href="#" data-toggle="treeview"><i data-count="{{$unreadMessagesCount}}" id="main_chat" class="app-menu__icon fa fa-comment {{$unreadMessagesCount > 0 ? 'notification-icon' :''}}"></i><span class="app-menu__label">Chat</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				
				@foreach($users as $user)
					@if($user->id != \Auth::user()->id)
						<li><a class="treeview-item" href=" {{url('/chat/'.encrypt($user->id).'/'.encrypt(\Auth::user()->id))}} "><i class="icon fa fa-circle {{$user->isOnline() ? 'text-success' : 'text-danger'}} "></i> {{$user->name}} <i id="user_{{$user->id}}" class=" app-menu__icon fa fa-comment {{ $user->unreadChatCount > 0 ? 'notification-icon' : ''}} "></i></a>   </li>
					@endif
				@endforeach
			</ul>
		</li>
	</ul>
</aside>