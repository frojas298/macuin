<?php $__env->startSection('titulo','Recuerdos'); ?>

<?php $__env->startSection('contenido'); ?>



    <h1 class="display-1 text-center text-danger mt-5"> RECUERDOS </h1>

    <div class="container">

        <?php $__currentLoopData = $consulRecuerdos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card w-75 mb-3">
        <div class="card-body">
            <h5 class="card-title fw-semibold"><?php echo e($item->titulo); ?></h5> <!-- Es para traer el dato especifico -->
            <p class="card-text"><?php echo e($item->fecha); ?></p>
            <p class="card-text"><?php echo e($item->recuerdo); ?></p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar<?php echo e($item->id); ?>"> <!-- Data-bs-target="#editar" que coincida con el id del modal.blade.php -->
            Editar
            </button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo e($item->id); ?> "> 
                Eliminar
            </button>
            
        </div>
        </div>

    <?php echo $__env->make('partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </div>

    <?php echo $__env->make('partials.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fer/pw182/laravel/resources/views/recuerdos.blade.php ENDPATH**/ ?>