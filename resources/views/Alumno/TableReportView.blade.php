@foreach ($listFinal as $element)
	
	<tr>
		<td>{{ $element["alm_nombre"] }}</td>
		<td>{{ $element["grd_nombre"] }}</td>

		<td>
			
			@foreach ($element["Materias"] as $key => $element2)
				
				@if ($key == sizeof($element["Materias"]) - 1)
					{{$element2["mat_nombre"]}}
				@else
					{{$element2["mat_nombre"]}},
				@endif

			@endforeach

		</td>
	</tr>

@endforeach