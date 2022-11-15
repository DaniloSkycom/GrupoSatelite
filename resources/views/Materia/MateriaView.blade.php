@extends("layouts.layoutsystem")

@section("Contenido")

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Materias</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">

							<form id="frmMateria">
								@csrf
								<input type="hidden" id="txtId" name="txtId" value="0">
								<div class="row">
									<div class="col-12 mb-1">
										<label for="txtNombre">Materia</label>
										<input type="text" class="form-control" id="txtNombre" name="txtNombre">
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
					<h4 class="card-title">Listado de Materias</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Materia</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="body-table-result">

									@include('Materia.TableView', $list_all)

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

			$("#frmMateria").trigger("reset");
			$("#txtId").val(0);

			$("#body-table-result").html(html);

		}
		
		function Action(){

			$.ajax({
				type: "POST",
				url: "{{url("Materia/action")}}",
				data: $("#frmMateria").serialize(),
				success: function(result){
					Clean(result);
				}
			})

		}

		function Destroy(element){

			$.ajax({
				type: "POST",
				url: "{{url("Materia/destroy")}}",
				data: {txtId:element["mat_id"], '_token':'{{csrf_token()}}'},
				success: function(result){
					Clean(result);
				}
			})

		}

		function Fill(element){

			$("#txtId").val(element["mat_id"]);
			$("#txtNombre").val(element["mat_nombre"]);

		}

	</script>

@endsection