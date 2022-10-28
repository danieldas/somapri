@extends('plantillas.principal')

@section('contenido')
<div class="col-md-10 col-md-offset-4">
	<div class="panel panel-default text-center">
		<div class="panel-heading">
			<h4>No autorizado</h4>
		</div>
		<div class="panel-body text-center" >
			<p>
				<span class="error-cod">403</span>
			</p>
			<p>				
				<span class="error-icon">
					<b class="glyphicon glyphicon-alert"></b>
				</span>
			</p>
			<p>
				No tiene permiso para acceder a este recurso.
			</p>
		</div>
	</div>	
</div>
@endsection