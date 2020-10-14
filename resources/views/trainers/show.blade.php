@extends('layouts.app')

@section('title','Trainer')

@section('content')	
	@include('common.errors')
	<img style="height: 200px;width: 200px;background-color:#EFEFEF;margin: 20px;" src="/images/{{$trainer->avatar}}" class="card-img-top rounded-circle mx-auto d-block">
	<div class="text-center">
		<h5 class="card-title">{{$trainer->name}}</h5>
		<p>{{$trainer->descripcion}}</p>
		<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
		<form method="post" action="/trainers/{{$trainer->slug}}">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-danger">Eliminar</button>
		</form>
		<modal-button></modal-button>
		<create-form-pokemon></create-form-pokemon>
		<list-of-pokemons></list-of-pokemons>
	</div>
@endsection