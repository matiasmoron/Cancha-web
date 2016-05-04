<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="padding: 20px;">
				<h2 style="padding-bottom:20px;">Canchas</h2>
						<div class="panel-heading"><?php echo e($cancha[0]->establecimiento->nombre); ?></div>
						<div class="panel-body">
							<p>Ciudad: <?php echo e($cancha[0]->establecimiento->ciudad); ?></p>
							<p>Provincia: <?php echo e($cancha[0]->establecimiento->provincia); ?></p>
							<p>Domicilio: <?php echo e($cancha[0]->establecimiento->direccion); ?></p>
						</div>
						<div class="panel-body">
							<p>Ciudad: <?php echo e($cancha['nombre']); ?></p>
						</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>