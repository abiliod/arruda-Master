<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#" disabled>CADASTROS</a></li>


    <li><a href="{{route('admins.products')}}">Produtos</a></li>
    {{---  @can('pessoa_listar') @endcan  14/04/2020 inclusao da funcionalidade Pessoas ---}}
    <li><a href="{{route('admin.pessoas')}}">Pessoas</a></li>
    {{--    @can('papel_listar')      @endcan--}}
    <li><a href="{{ route('admin.papel') }}">Papel</a></li>
    {{--    @can('usuario_listar')       @endcan  --}}
    <li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
    {{---   @can('pagina_listar')     @endcan  --}}
    <li><a href="{{ route('admins.paginas') }}">Páginas</a></li>




    <li><a href="{{route('admins.slides')}}">Slides</a></li>
    <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
    <li><a href="{{ route('site.contato') }}">Contato</a>
    <li><a href="{{ route('sair') }}">Sair</a></li>

</ul>
<nav>
	<div class="nav-wrapper #4db6ac teal lighten-2">
		<div class="container">
			<a href="{{ route('/') }}" class="brand-logo center">Arruda Calçados</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse">
				<i class="material-icons">menu</i>
			</a>
			<ul class="right hide-on-med-and-down">
				@if(Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a>
				@else
                    <li><a href="{{ route('home') }}">HOME</a></li>
					<li><a  class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}
						<i class="material-icons right">arrow_drop_down</i></a></li>
						<ul id="dropdown1" class="dropdown-content"></ul>
                    <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a>
                    <li><a href="{{ route('sair') }}">Sair</a></li>
                @endif
	    	</ul>
            <ul class="side-nav" id="mobile-demo">
                @if(Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                <li><a href="{{ route('site.contato') }}">Contato</a>
                @else
                    <li><a href="#">CADASTROS</a></li>

                    <li><a href="{{route('admins.products')}}">Produtos</a></li>
                    {{---     @can('slide_listar')     @endcan inicio 26/02/2020 inclusao da funcionalidade Slide ---}}
                    {{---  @can('pessoa_listar') @endcan  14/04/2020 inclusao da funcionalidade Pessoas ---}}
                    <li><a href="{{route('admin.pessoas')}}">Pessoas</a></li>
                    {{--    @can('papel_listar')      @endcan--}}
                    <li><a href="{{ route('admin.papel') }}">Papel</a></li>
                    {{--    @can('usuario_listar')       @endcan  --}}
                    <li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
                    {{---   @can('pagina_listar')     @endcan  --}}
                    {{---   @can('pagina_listar')     @endcan  --}}
                    <li><a href="{{ route('admins.paginas') }}">Páginas</a></li>

                    <li><a href="{{route('admins.slides')}}">Slides</a></li>
                    <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                    <li><a href="{{ route('site.contato') }}">Contato</a>
                    <li><a href="{{ route('sair') }}">Sair</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
