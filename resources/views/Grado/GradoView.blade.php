@extends("layouts.layoutsystem")

@section("Contenido")

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Grados</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">

							<form id="frmGrado">
								@csrf
								<input type="hidden" id="txtId" name="txtId" value="0">
								<div class="row">
									<div class="col-12 mb-1">
										<label for="txtNombre">Grado</label>
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
					<h4 class="card-title">Listado de Grados</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Grado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="body-table-result">

									@include('Grado.TableView', $list_all)

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

			$("#frmGrado").trigger("reset");
			$("#txtId").val(0);

			$("#body-table-result").html(html);

		}
		
		function Action(){

			$.ajax({
				type: "POST",
				url: "{{url("Grado/action")}}",
				data: $("#frmGrado").serialize(),
				success: function(result){
					Clean(result);
				}
			})

		}

		function Destroy(element){

			$.ajax({
				type: "POST",
				url: "{{url("Grado/destroy")}}",
				data: {txtId:element["grd_id"], '_token':'{{csrf_token()}}'},
				success: function(result){
					Clean(result);
				}
			})

		}

		function Fill(element){

			$("#txtId").val(element["grd_id"]);
			$("#txtNombre").val(element["grd_nombre"]);

		}

	</script>

@endsection