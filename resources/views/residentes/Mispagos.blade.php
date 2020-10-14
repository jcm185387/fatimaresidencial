@extends('layouts.AdminLayout')

	@section('content')	
		<div class="w3-row-padding w3-margin-bottom">
			<div class="content" style="width: 90%;margin: auto;margin-top: 50px;">
				
				<div style="margin-top: 50px;">
					<h4>
						Mis pagos
					</h4>	
					<br>
					<span>Añade tus pagos a la colonia y revisa tu historial</span>
					<div style="float: right;">
						<modal-buttonaddpagos></modal-buttonaddpagos>
						<br>
						<br>
						<br>
					</div>
					<list-of-pagos></list-of-pagos>	
					<create-form-pago></create-form-pago>	
				</div>
			</div>				
		</div>
@endsection