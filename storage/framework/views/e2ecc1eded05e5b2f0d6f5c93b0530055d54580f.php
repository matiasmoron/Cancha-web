<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
				<h2 style="padding-bottom:20px;">Canchas</h2>
				<?php echo Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role'=> 'search']); ?>

					<div class="form-group">
						<?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Establecimiento']); ?>

					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				<?php echo Form::close(); ?>

					<?php foreach($canchas as $cancha): ?>
						<div class="panel-heading"><?php echo e($cancha->establecimiento->nombre); ?></div>
						<div class="panel-body">
							<p>Ciudad: <?php echo e($cancha->establecimiento->ciudad); ?></p>
							<p>Provincia: <?php echo e($cancha->establecimiento->provincia); ?></p>
							<p>Domicilio: <?php echo e($cancha->establecimiento->direccion); ?></p>
							<div class="panel-heading"><?php echo e($cancha->nombre); ?></div>
							<div class="panel-body">
								<p>Cantidad Jugadores: <?php echo e($cancha->cantjugadores); ?></p>
							</div>
						</div>
						<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>