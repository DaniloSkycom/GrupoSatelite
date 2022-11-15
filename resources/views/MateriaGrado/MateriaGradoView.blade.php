@extends("layouts.layoutsystem")

@section("css")
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section("Contenido")

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">MateriaGrados</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">

							<form id="frmMateriaGrado">
								@csrf
								<input type="hidden" id="txtId" name="txtId" value="0">
								<div class="row">
									<div class="col-6 mb-1">
										<label for="slcGrado">Grado</label>
										<select name="slcGrado" id="slcGrado" class="select2">
											@foreach ($list_grado as $element)
												<option value="{{ $element["grd_id"] }}">{{ $element["grd_nombre"] }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-6 mb-1">
										<label for="slcMateria">Materias</label>
										<select name="slcMateria[]" id="slcMateria" class="select2" multiple="multiple">
											@foreach ($list_materia as $element)
												<option value="{{ $element["mat_id"] }}">{{ $element["mat_nombre"] }}</option>
											@endforeach
										</select>
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
					<h4 class="card-title">Listado de MateriaGrados</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Grado</th>
										<th>Materia</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="body-table-result">

									@include('MateriaGrado.TableView', $list_all)

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section("library_js")
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('code_js')
	
	<script type="text/javascript">

		$(document).ready(function(){

			$(".select2").select2();

		});

		function Clean(html){

			Swal.fire(
				'Exito',
				'Cambios guardados',
				'success'
			);

			$("#frmMateriaGrado").trigger("reset");
			$("#txtId").val(0);

			$("#body-table-result").html(html);

		}
		
		function Action(){

			$.ajax({
				type: "POST",
				url: "{{url("MateriaGrado/action")}}",
				data: $("#frmMateriaGrado").serialize(),
				success: function(result){
					Clean(result);
				}
			})

		}

		function Destroy(element){

			$.ajax({
				type: "POST",
				url: "{{url("MateriaGrado/destroy")}}",
				data: {txtId:element["mxg_id"], '_token':'{{csrf_token()}}'},
				success: function(result){
					Clean(result);
				}
			})

		}

		function Fill(element){

			$("#txtId").val(element["mxg_id"]);

		}

	</script>

@endsection