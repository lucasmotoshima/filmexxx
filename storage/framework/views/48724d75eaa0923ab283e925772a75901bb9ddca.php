<?php $__env->startSection('content'); ?>
<h1>Detalhes</h1>


<table border="1" style="margin: 0px 50px;">
	<tr>
		<th colspan="2"><?php echo e($resList['title']); ?> (<?php echo e($resList['original_title']); ?> - <i><?php echo e($resList['original_language']); ?></i>)</th>
	</tr>
	<tr>
		<td><img src="https://image.tmdb.org/t/p/w500/<?php echo e($resList['backdrop_path']); ?>"></td><td align="left"><?php echo e($resList['overview']); ?></td>
	</tr>
	<tr>
		<td>Classificação</td>
		<td><?php echo e($resList['adult']); ?></td>
	</tr>
	<tr>
		<td>homepage</td>
		<td><?php echo e($resList['homepage']); ?></td>
	</tr>
	<tr>
		<td>genres</td>
		<td>
			<?php $__currentLoopData = $resList['genres']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				-<?php echo e($genre['name']); ?><br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		</td>
	</tr>
	<tr>
		<td>budget</td>
		<td><?php echo e($resList['budget']); ?></td>
	</tr>
	<tr>
		<td>belongs_to_collection</td>
		<td>
			<img src="https://image.tmdb.org/t/p/w500/<?php echo e($resList['belongs_to_collection']['poster_path']); ?>" width="50">
			<?php echo e($resList['belongs_to_collection']['name']); ?>

		</td>
	</tr>
	<tr>
		<td>imdb_id</td>
		<td><?php echo e($resList['imdb_id']); ?></td>
	</tr>
	<tr>
		<td>original_language</td>
		<td><?php echo e($resList['original_language']); ?></td>
	</tr>	
	<tr>
		<td>popularity</td>
		<td><?php echo e($resList['popularity']); ?></td>
	</tr>
	<tr>
		<td>production_companies</td>
		<td>
			<?php $__currentLoopData = $resList['production_companies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodcomp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<img src="https://image.tmdb.org/t/p/original/<?php echo e($prodcomp['logo_path']); ?>" width="50">
				-<?php echo e($prodcomp['name']); ?>(<?php echo e($prodcomp['origin_country']); ?>)<br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		</td>
	</tr>
	<tr>
		<td>production_countries</td>
		<td>
			<?php $__currentLoopData = $resList['production_countries']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodcountr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				-<?php echo e($prodcountr['name']); ?> (<?php echo e($prodcountr['iso_3166_1']); ?>)<br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		</td>
	</tr>
	<tr>
		<td>release_date</td>
		<td><?php echo e($resList['release_date']); ?></td>
	</tr>
	<tr>
		<td>revenue</td>
		<td><?php echo e($resList['revenue']); ?></td>
	</tr>
	<tr>
		<td>runtime</td>
		<td><?php echo e($resList['runtime']); ?> min</td>
	</tr>
	<tr>
		<td>production_countries</td>
		<td>
			<?php $__currentLoopData = $resList['spoken_languages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spklanguage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				-<?php echo e($spklanguage['name']); ?> (<?php echo e($spklanguage['iso_639_1']); ?>)<br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		</td>
	</tr>
	<tr>
		<td>status</td>
		<td><?php echo e($resList['status']); ?></td>
	</tr>
	<tr>
		<td>tagline</td>
		<td><?php echo e($resList['tagline']); ?></td>
	</tr>
	<tr>
		<td>video</td>
		<td><?php echo e($resList['video']); ?></td>
	</tr>
	<tr>
		<td>vote_average</td>
		<td><?php echo e($resList['vote_average']); ?></td>
	</tr>
	<tr>
		<td>vote_count</td>
		<td><?php echo e($resList['vote_count']); ?></td>
	</tr>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>