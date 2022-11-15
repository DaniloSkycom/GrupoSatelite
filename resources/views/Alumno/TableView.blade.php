@foreach ($list_all as $element)
										
	<tr>
		<td>{{ $element["alm_codigo"] }}</td>
		<td>{{ $element["alm_nombre"] }}</td>
		<td>{{ $element["alm_edad"] }}</td>
		<td>{{ $element["alm_sexo"] }}</td>
		<td>{{ $element["grd_nombre"] }}</td>
		<td>{{ $element["alm_observacion"] }}</td>
		<td>
			<button class="btn btn-outline-warning" type="button" onclick="Fill({{$element}})">Editar</button>
			<button class="btn btn-outline-danger" type="button" onclick="Destroy({{$element}})">Eliminar</button>
		</td>
	</tr>

@endforeach