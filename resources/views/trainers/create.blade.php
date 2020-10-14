@extends('layouts.app')

@section('title','trainerCreate')

@section('content')	
	@include('common.errors')
	<form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
			@csrf
		@include('trainers.form')
		<!--
		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="name" class="form-control">
		</div>
			<div class="form-group">
			<label>Slug</label>
			<input type="text" name="slug" class="form-control">
		</div>
		<div class="form-group">
			<label>Avatar</label>
			<input type="file" name="avatar">
		</div>
		<div class="form-group">
			<textarea name="descripcion" class="form-control">
				
			</textarea>
		</div>-->
		<button type="submit" class="btn btn-primary">Guardar</button>	
	</form>
@endsection
