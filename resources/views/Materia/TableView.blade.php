@foreach ($list_all as $element)
										
	<tr>
		<td>{{ $element["mat_nombre"] }}</td>
		<td>
			<button class="btn btn-outline-warning" type="button" onclick="Fill({{$element}})">Editar</button>
			<button class="btn btn-outline-danger" type="button" onclick="Destroy({{$element}})">Eliminar</button>
		</td>
	</tr>

@endforeach