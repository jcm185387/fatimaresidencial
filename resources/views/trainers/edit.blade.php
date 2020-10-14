@extends('layouts.app')

@section('title','Trainer Edit')

@section('content')	
	<form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		@include('trainers.form');
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="name" value="{{$trainer->name}}" class="form-control">
		</div>
		<div class="form-group">
			<label>Avatar</label>
			<input type="file" name="avatar">
		</div>
		<img style="height: 200px;width: 200px;background-color:#EFEFEF;margin: 20px;" src="/images/{{$trainer->avatar}}" class="card-img-top rounded-circle mx-auto d-block">
		<div class="form-group">
			<textarea name="descripcion"  class="form-control">
				{{$trainer->descripcion}}
			</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Actualizar</button>	
	</form>
@endsection
