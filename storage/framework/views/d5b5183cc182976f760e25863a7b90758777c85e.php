<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Busca tu Cancha</div>
                <div class="panel-body">
                    <?php echo Form::open(['url' => 'canchas/todas', 'method' => 'GET', 'role'=> 'search']); ?>

                    <div class="form-group">
						<?php echo Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']); ?>

                        <?php echo Form::text('cantjugadores', null, ['class' => 'form-control', 'placeholder' => 'Cantidad Jugadores']); ?>

                        <?php echo Form::text('superficie', null, ['class' => 'form-control', 'placeholder' => 'Tipo de Superficie']); ?>

					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>