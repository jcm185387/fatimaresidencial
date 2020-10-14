@extends('layouts.AdminLayout')

	@section('content')	
		<div class="w3-row-padding w3-margin-bottom">
			<h4>
				Se muestran las residencias registradas actualmente
			</h4>	
			
			<div class="content" style="width: 90%;margin: auto;margin-top: 50px;">
				
				<div class="container" style="margin-top: 50px;">
					<modal-buttonaddresidencia></modal-buttonaddresidencia>
					<br>
					<br>
					<br>
					<list-of-residencias></list-of-residencias>	
				</div>
			</div>	
			<create-form-residencia></create-form-residencia>			
		</div>
@endsection