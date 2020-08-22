@extends('template.index')

@section('content')
<h1>Home page</h1>
	<p>Total de registros encontrados: {{count($results)}}</p>

	<form action="{{URL::to('/buscar')}}" method="post" name="buscaForm" accept-charset="utf-8" enctype="multipart/form-data">
		{{csrf_field()}}
		<table border="0" style="margin: 0px 50px; ">
			<tr>
				<th colspan="2">Busca</th>
			<tr>
			<tr>
				<th>Nome</th>
				<th>Gênero</th>
			<tr>
				<td><input type="text" name="nome"/></td>
				<td>
					<select name="genero" style="" name="genero" class="form-control" id="genero">
						<option value="">Selecione</option>
					@foreach($genres as $resg)
						<option value="{{$resg['id']}}">{{$resg['name']}}</option>
					@endforeach	
					</select>
				</td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" value="buscar"/></th>
			<tr>
		</table>
		
	</form>
	<br>

	<table border="1"  style="margin: 0px 50px;">
		<tr>
			<th>Name</th>
			<th>Overview</th>
			<th>Release</th>
			<th>Genre</th>
			<th>Data Review</th>
			<th>Gêneros</th>
		</tr>
		@foreach($results as $res)
		<tr>
			<td>{{$res['id']}}</td>
			<td>
				<a href="detalhe/{{$res['id']}}">
					<img src="https://image.tmdb.org/t/p/w500/{{$res['backdrop_path']}}" width='200'/>
				</a> 
			</td>
			<td>{{$res['title']}}</td>
			<td>{{$res['overview']}}</td>
			<td>{{$res['release_date']}}</td>
			<td>{{$res['genres']}}</td>
		</tr>
		@endforeach	
	</table>

@endsection()
