@extends("layouts.layoutsystem")

@section("Contenido")

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Alumnos</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">

							<form id="frmAlumno">
								@csrf
								<input type="hidden" id="txtId" name="txtId" value="0">
								<div class="row">
									<div class="col-12 mb-1">
										<label for="txtCodigo">Codigo</label>
										<input type="text" class="form-control" id="txtCodigo" name="txtCodigo">
									</div>
								</div>
								<div class="row">
									<div class="col-12 mb-1">
										<label for="txtNombre">Nombre</label>
										<input type="text" class="form-control" id="txtNombre" name="txtNombre">
									</div>
								</div>
								<div class="row">
									<div class="col-12 mb-1">
										<label for="txtEdad">Edad</label>
										<input type="text" class="form-control" id="txtEdad" name="txtEdad">
									</div>
								</div>
								<div class="row">
									<div class="col-12 mb-1">
										<label for="slcSexo">Sexo</label>
										<select name="slcSexo" id="slcSexo" class="form-select">
											<option value="null">Seleccione</option>
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-12 mb-1">
										<label for="slcGrado">Grado</label>
										<select name="slcGrado" id="slcGrado" class="form-select">
											<option value="null">Seleccione</option>
											@foreach ($list_grado as $element)
												<option value="{{ $element["grd_id"] }}">{{ $element["grd_nombre"] }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-12 mb-1">
										<label for="txtObservacion">Observacion</label>
										<input type="text" class="form-control" id="txtObservacion" name="txtObservacion">
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<button class="btn btn-outline-success" type="button" onclick="Action()">Guardar</button>
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Listado de Alumnos</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>codigo</th>
										<th>nombre</th>
										<th>edad</th>
										<th>sexo</th>
										<th>Grado</th>
										<th>nombre</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="body-table-result">

									@include('Alumno.TableView', $list_all)

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('code_js')
	
	<script type="text/javascript">

		function Clean(html){

			Swal.fire(
				'Exito',
				'Cambios guardados',
				'success'
			);

			$("#frmAlumno").trigger("reset");
			$("#txtId").val(0);

			$("#body-table-result").html(html);

		}
		
		function Action(){

			$.ajax({
				type: "POST",
				url: "{{url("Alumno/action")}}",
				data: $("#frmAlumno").serialize(),
				success: function(result){
					Clean(result);
				}
			})

		}

		function Destroy(element){

			$.ajax({
				type: "POST",
				url: "{{url("Alumno/destroy")}}",
				data: {txtId:element["alm_id"], '_token':'{{csrf_token()}}'},
				success: function(result){
					Clean(result);
				}
			})

		}

		function Fill(element){

			$("#txtId").val(element["alm_id"]);

			$("#txtCodigo").val(element["alm_codigo"]);
			$("#txtNombre").val(element["alm_nombre"]);
			$("#txtEdad").val(element["alm_edad"]);
			$("#slcSexo").val(element["alm_sexo"]);
			$("#slcGrado").val(element["alm_id_grd"]);
			$("#txtNombre").val(element["alm_Observacion"]);

		}

	</script>

@endsection