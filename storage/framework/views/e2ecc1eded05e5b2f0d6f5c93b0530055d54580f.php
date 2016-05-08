<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
				<h2 style="padding-bottom:20px;">Canchas</h2>
                <div>
				    <?php echo Form::open(['url' => 'canchas/todas', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role'=> 'search']); ?>

					<div class="form-group">
						<?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Establecimiento']); ?>

					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				    <?php echo Form::close(); ?>

                </div>
                <?php foreach($canchas as $cancha): ?>
                    <?php if($cancha->establecimiento->id_ciudad == $ciudad): ?>
                    <div class="panel-heading"><?php echo e($cancha->establecimiento->nombre); ?></div>
                    <div class="panel-body">
                        <p>Ciudad: <?php echo e($cancha->establecimiento->ciudad->ciudad_nombre); ?></p>
                        <p>Provincia: <?php echo e($cancha->establecimiento->ciudad->provincia->provincia_nombre); ?></p>
                        <p>Domicilio: <?php echo e($cancha->establecimiento->direccion); ?></p>
                        <div class="panel-heading"><?php echo e($cancha->nombre_cancha); ?></div>
                        <div class="panel-body">
                            <p>Cantidad Jugadores: <?php echo e($cancha->cant_jugadores); ?></p>
                            <p>Superficie: <?php echo e($cancha->superficie->superficie); ?></p>
                            <?php echo Form::open(['route' => ['turnos.cancha' , $cancha->id], 'method' => 'GET', 'class' => 'btn btn-default pull-right']); ?>

                                <?php echo Form::submit('Pedir Turno'); ?>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                    <?php endif; ?>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>