@extends('template.index')

@section('content')
<h1>Detalhes</h1>


<table border="1" style="margin: 0px 50px;">
	<tr>
		<th colspan="2">{{$resList['title']}} ({{$resList['original_title']}} - <i>{{$resList['original_language']}}</i>)</th>
	</tr>
	<tr>
		<td><img src="https://image.tmdb.org/t/p/w500/{{$resList['backdrop_path']}}"></td><td align="left">{{$resList['overview']}}</td>
	</tr>
	<tr>
		<td>Classificação</td>
		<td>{{$resList['adult']}}</td>
	</tr>
	<tr>
		<td>homepage</td>
		<td>{{$resList['homepage']}}</td>
	</tr>
	<tr>
		<td>genres</td>
		<td>
			@foreach($resList['genres'] as $genre)
				-{{$genre['name']}}<br>
			@endforeach	
		</td>
	</tr>
	<tr>
		<td>budget</td>
		<td>{{$resList['budget']}}</td>
	</tr>
	<tr>
		<td>belongs_to_collection</td>
		<td>
			<img src="https://image.tmdb.org/t/p/w500/{{$resList['belongs_to_collection']['poster_path']}}" width="50">
			{{$resList['belongs_to_collection']['name']}}
		</td>
	</tr>
	<tr>
		<td>imdb_id</td>
		<td>{{$resList['imdb_id']}}</td>
	</tr>
	<tr>
		<td>original_language</td>
		<td>{{$resList['original_language']}}</td>
	</tr>	
	<tr>
		<td>popularity</td>
		<td>{{$resList['popularity']}}</td>
	</tr>
	<tr>
		<td>production_companies</td>
		<td>
			@foreach($resList['production_companies'] as $prodcomp)
				<img src="https://image.tmdb.org/t/p/original/{{$prodcomp['logo_path']}}" width="50">
				-{{$prodcomp['name']}}({{$prodcomp['origin_country']}})<br>
			@endforeach	
		</td>
	</tr>
	<tr>
		<td>production_countries</td>
		<td>
			@foreach($resList['production_countries'] as $prodcountr)
				-{{$prodcountr['name']}} ({{$prodcountr['iso_3166_1']}})<br>
			@endforeach	
		</td>
	</tr>
	<tr>
		<td>release_date</td>
		<td>{{$resList['release_date']}}</td>
	</tr>
	<tr>
		<td>revenue</td>
		<td>{{$resList['revenue']}}</td>
	</tr>
	<tr>
		<td>runtime</td>
		<td>{{$resList['runtime']}} min</td>
	</tr>
	<tr>
		<td>production_countries</td>
		<td>
			@foreach($resList['spoken_languages'] as $spklanguage)
				-{{$spklanguage['name']}} ({{$spklanguage['iso_639_1']}})<br>
			@endforeach	
		</td>
	</tr>
	<tr>
		<td>status</td>
		<td>{{$resList['status']}}</td>
	</tr>
	<tr>
		<td>tagline</td>
		<td>{{$resList['tagline']}}</td>
	</tr>
	<tr>
		<td>video</td>
		<td>{{$resList['video']}}</td>
	</tr>
	<tr>
		<td>vote_average</td>
		<td>{{$resList['vote_average']}}</td>
	</tr>
	<tr>
		<td>vote_count</td>
		<td>{{$resList['vote_count']}}</td>
	</tr>
</table>
@endsection()