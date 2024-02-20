<?php $__env->startSection("titulo","Recuerdos"); ?>

<?php $__env->startSection("contenido"); ?>

<h1 class="display-1 text-center text-danger mt-5"> Recuerdos</h1>

<?php echo $__env->make("partials.pagination", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

    
<?php echo $__env->make("layouts.plantilla", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fer/pw182/practica3/resources/views/recuerdos.blade.php ENDPATH**/ ?>