@extends("layouts.layoutsystem")

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
								<div class="row">
									<div class="col-6 mb-1">
										<label for="slcAlumno">Alumnos</label>
										<select name="slcAlumno" id="slcAlumno" class="form-select" onchange="getAlumnoMaterias(this.value)">
											<option value="ALL">todos</option>
											@foreach ($list_all as $element)
												<option value="{{ $element["alm_id"] }}">{{ $element["alm_nombre"] }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<button class="btn btn-outline-success" type="button" onclick="Action()">Buscar</button>
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
					<h4 class="card-title">Reporte Alumnos</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table class="table">
								<thead>
									<tr>
										<th>Alumno</th>
										<th>Grado</th>
										<th>Materias</th>
									</tr>
								</thead>
								<tbody id="body-table-result">

									@include('Alumno.TableReportView', $listFinal)

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section("code_js")

	<script>

		function getAlumnoMaterias(valor){

			$.ajax({
				type: "POST",
				url: "{{ url("Alumno/findReport") }}",
				data: {valor:valor, '_token':'{{csrf_token()}}'},
				success: function(result){
					$("#body-table-result").html(result);
				}
			})

		}
	</script>

@endsection