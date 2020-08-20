<?php $__env->startSection('content'); ?>
<h1>Home page</h1>
	<p>Total de registros encontrados: <?php echo e(count($results)); ?></p>

	<form action="<?php echo e(URL::to('/listar')); ?>" method="post" name="buscaForm" accept-charset="utf-8" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

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
					<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($resg['id']); ?>"><?php echo e($resg['name']); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
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
		<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($res['id']); ?></td>
			<td>
				<a href="http://localhost/quikdev/filmes/public/detalhe/<?php echo e($res['id']); ?>">
					<img src="https://image.tmdb.org/t/p/w500/<?php echo e($res['backdrop_path']); ?>" width='200'/>
				</a> 
			</td>
			<td><?php echo e($res['title']); ?></td>
			<td><?php echo e($res['overview']); ?></td>
			<td><?php echo e($res['release_date']); ?></td>
			<td><?php echo e($res['genres']); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
	</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>