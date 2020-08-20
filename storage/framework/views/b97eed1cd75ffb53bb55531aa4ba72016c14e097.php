<?php $__env->startSection('content'); ?>

<h1>HOme page do site</h1>

	<?
	
	
	$contador = count($resultado['results']);
	echo "Total de registros encontrados: ".$contador; 
	echo '<table border="1"><tr><th>#</th><th>Poster</th><th>Name</th><th>Overview</th><th>Release</th><th>Genre</th></tr>'; 
	for ($i=0; $i < $contador; $i++) {
		echo '<tr>'; 
		echo "<td>".($i+1)."</td>";
		echo "<td><a href=http://localhost/quikdev/filmes/public/detalhe/".$resultado['results'][$i]['id']."><img src='https://image.tmdb.org/t/p/w500/".$resultado['results'][$i]['backdrop_path']."' width='200'/></a></td>";
		echo "<td>".$resultado['results'][$i]['title']."</td>";
		echo "<td>".$resultado['results'][$i]['overview']."</td>";
		echo "<td>".date('d/m/Y',strtotime($resultado['results'][$i]['release_date']))."</td>";


		//=================================================================	
		echo "<td>";
		$contGenre = count($resultado['results'][$i]['genre_ids']);
		for ($j=0; $j < $contGenre; $j++) {
			$mystring 	= $resGenre['genres'];
			$findme   	= $resultado['results'][$i]['genre_ids'][$j];
			$pos 		= array_search($resultado['results'][$i]['genre_ids'][$j], array_column($resGenre['genres'], 'id'));
			echo '-'.$resGenre['genres'][$pos]['name'].'<br>';
		}
		echo "</td>";
		//=================================================================
		echo '</tr>';
	}
	echo '</table>'; 
	?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.listFilmes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>