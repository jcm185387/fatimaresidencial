@extends('layouts.AdminLayout')

	@section('content')	
		<div class="w3-row-padding w3-margin-bottom">
			<h4>
				Se muestran las residencias registradas actualmente
			</h4>	
			
			<div class="content" style="width: 90%;margin: auto;margin-top: 50px;">
				
				<div class="container" style="margin-top: 50px;">
					<modal-buttonaddresidente></modal-buttonaddresidente>
					<br>
					<br>
					<br>
					<list-of-residentes></list-of-residentes>	
				</div>
			</div>	
			<create-form-residente></create-form-residente>			
		</div>
@endsection