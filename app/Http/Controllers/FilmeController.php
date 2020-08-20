<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmeController extends Controller
{
    //
    public function index(Request $request){
    	
		//=========================================================================================
		$urlGenre 	= "https://api.themoviedb.org/3/genre/movie/list?api_key=bad6760342e9866293716dd3a6a9e503&language=pt-BR";
		$resGenre 	= json_decode(file_get_contents($urlGenre),true);
		$genres 	= $resGenre['genres'];
		//=========================================================================================
		
		//=========================================================================================
		if($request->input('nome')!=null){
			$search = $request->input('nome');
			$url 	= "https://api.themoviedb.org/3/search/movie?api_key=bad6760342e9866293716dd3a6a9e503&query=$search";
		}else{
			$url 	= "https://api.themoviedb.org/4/list/1?page=1&api_key=bad6760342e9866293716dd3a6a9e503&sort_by=title.asc&language=pt-BR";
		}
		$resultado 	= json_decode(file_get_contents($url),true);
		//=========================================================================================
		
		$totResults = count($resultado['results']);
		
		$results = array();
		
		for ($i=0; $i < $totResults; $i++) {
			if($request->input('genero')!==null){
				if(in_array($request->input('genero'), $resultado['results'][$i]['genre_ids'])){
					$results[$i]['id'] 					= $resultado['results'][$i]['id'];
					$results[$i]['backdrop_path'] 		= $resultado['results'][$i]['backdrop_path'];
					$results[$i]['title'] 				= $resultado['results'][$i]['title'];
					$results[$i]['overview'] 			= $resultado['results'][$i]['overview'];
					if(isset($resultado['results'][$i]['release_date']))
						$results[$i]['release_date'] 	= (($resultado['results'][$i]['release_date']!='')?(date('d/m/Y',strtotime($resultado['results'][$i]['release_date']))):(null));
					else
						$results[$i]['release_date']	='null';
					$contGenre 							= count($resultado['results'][$i]['genre_ids']);
					$results[$i]['genres'] 				= '';
					for ($j=0; $j < $contGenre; $j++) {
						$mystring 							= $resGenre['genres'];
						$findme   							= $resultado['results'][$i]['genre_ids'][$j];
						$pos 								= array_search($resultado['results'][$i]['genre_ids'][$j], array_column($resGenre['genres'], 'id'));
						$results[$i]['genres'] 				.= $resGenre['genres'][$pos]['name'].' | ';
					}
				}
			}else{
				$results[$i]['id'] 					= $resultado['results'][$i]['id'];
				$results[$i]['backdrop_path'] 		= $resultado['results'][$i]['backdrop_path'];
				$results[$i]['title'] 				= $resultado['results'][$i]['title'];
				$results[$i]['overview'] 			= $resultado['results'][$i]['overview'];
				if(isset($resultado['results'][$i]['release_date']))
					$results[$i]['release_date'] 	= (($resultado['results'][$i]['release_date']!='')?(date('d/m/Y',strtotime($resultado['results'][$i]['release_date']))):(null));
				else
					$results[$i]['release_date']	='null';
				$contGenre 							= count($resultado['results'][$i]['genre_ids']);
				$results[$i]['genres'] 				= '';
				for ($j=0; $j < $contGenre; $j++) {
					$mystring 							= $resGenre['genres'];
					$findme   							= $resultado['results'][$i]['genre_ids'][$j];
					$pos 								= array_search($resultado['results'][$i]['genre_ids'][$j], array_column($resGenre['genres'], 'id'));
					$results[$i]['genres'] 				.= $resGenre['genres'][$pos]['name'].' | ';
				}
			}
		}
		//var_dump($genresList);
	   	return view('filmes.listFilmes',compact('results','genres'));
    }

	public function detalhe($movie_id){
		$urlMovie = "https://api.themoviedb.org/3/movie/$movie_id?api_key=bad6760342e9866293716dd3a6a9e503&language&language=pt-BR";
		$resMovie = json_decode(file_get_contents($urlMovie),true);
		
		$resList = array();
		$resList['adult']						= $resMovie['adult'];
		$resList['backdrop_path']				= $resMovie['backdrop_path'];
		$resList['belongs_to_collection']		= $resMovie['belongs_to_collection'];
		$resList['budget']						= $resMovie['budget'];
		
		$contgenres 							= count($resMovie['genres']);
		for ($j=0; $j < $contgenres; $j++) {
			$resList['genres'][$j]['id']							= $resMovie['genres'][$j]['id'];
			$resList['genres'][$j]['name']							= $resMovie['genres'][$j]['name'];
		}
		
		$resList['homepage']					= $resMovie['homepage'];
		$resList['id']							= $resMovie['id'];
		$resList['imdb_id']						= $resMovie['imdb_id'];
		$resList['original_language']			= $resMovie['original_language'];
		$resList['original_title']				= $resMovie['original_title'];
		$resList['overview']					= $resMovie['overview'];
		$resList['popularity']					= $resMovie['popularity'];
		$resList['poster_path']					= $resMovie['poster_path'];
		
		$contproductioncompanies 					= count($resMovie['production_companies']);
		for ($j=0; $j < $contproductioncompanies; $j++) {
			$resList['production_companies'][$j]['id']				= $resMovie['production_companies'][$j]['id'];
			$resList['production_companies'][$j]['logo_path']		= $resMovie['production_companies'][$j]['logo_path'];
			$resList['production_companies'][$j]['name']			= $resMovie['production_companies'][$j]['name'];
			$resList['production_companies'][$j]['origin_country']	= $resMovie['production_companies'][$j]['origin_country'];
		}
		
		$contproductioncountries 				= count($resMovie['production_countries']);
		for ($j=0; $j < $contproductioncountries; $j++) {
			$resList['production_countries'][$j]['iso_3166_1']		= $resMovie['production_countries'][$j]['iso_3166_1'];
			$resList['production_countries'][$j]['name']			= $resMovie['production_countries'][$j]['name'];
		}
		
		$resList['release_date']				= $resMovie['release_date'];
		$resList['revenue']						= $resMovie['revenue'];
		$resList['runtime']						= $resMovie['runtime'];
		
		$contspokenlanguages 					= count($resMovie['spoken_languages']);
		for ($j=0; $j < $contspokenlanguages; $j++) {
			$resList['spoken_languages'][$j]['iso_639_1']			= $resMovie['spoken_languages'][$j]['iso_639_1'];
			$resList['spoken_languages'][$j]['name']				= $resMovie['spoken_languages'][$j]['name'];
		}
		
		$resList['status']						= $resMovie['status'];
		$resList['tagline']						= $resMovie['tagline'];
		$resList['title']						= $resMovie['title'];
		$resList['video']						= $resMovie['video'];
		$resList['vote_average']				= $resMovie['vote_average'];
		$resList['vote_count']					= $resMovie['vote_average'];
		
		
		//var_dump($resList);
	    return view('filmes.detailFilmes',compact('resList'));
	}
}
