@extends('layouts._site.app')

@section('content')
<div class="container">
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('home')}}" class="breadcrumb">Início</a>
			         <a class="breadcrumb">Dashboard</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
    <div class="row col s12">
        <label>Linha do Tempo 100%</label>
        <input  type="range"  min="10" max="100" value="100" caption="Linha do Tempo"/>
    </div>
    <div class="col s12 m6 #e3f2fd blue lighten-5">

			<div class="card horizontal #e3f2fd blue lighten-5">
				<div class="card-image, circle, col s12 m6">
					<img src="{{asset('img/institucional/alex.png')}}" class="circle">
				</div>
				<div class="card-stacked">
					<div class="card-content">
						<p>Obrigado por fazer parte da minha rede de contatos tenho certeza que realizaremos grandes negócios.
							<br><h5> <font color="# 1b5e20 verde escurecer-4">  Eletro Energia | Nova Força | Energyled | Eletro Meta</font></h5>
							<h6> </h6>
						</p>
					</div>
					<div class="card-action">
						<a href="#">VER PROMOÇÕES</a>
					</div>
				</div>
			</div>
		</div>


</div>


@endsection
