<?php $__env->startSection('titulo', 'Formulario'); ?>
    
<?php $__env->startSection('contenido'); ?>

    <h1 class="display-1 text-center text-danger ">Formulario</h1>

    <div class="container mt-5" style="margin: 100">

        <?php if(session()->has('confirmacion')): ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong><?php echo e(session('confirmacion')); ?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>

      <!--   <?php if($errors -> any()): ?>
        <?php $__currentLoopData = $errors ->all (); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
         <strong><?php echo e($error); ?> </strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?> --> 
        <div class="card ">
            <form method="post" action="/recuerdo">
              <?php echo csrf_field(); ?> 
                <div class="card-header text-primary fs-5 fw-semibold text-center">
                    Introduce tus recuerdos aqui...
                </div>
                
                <div class="card-body">

                    <form>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titulo: </label>
                            <input type="text" name="txtTitulo" class="form-control" value="<?php echo e(old('txtTitulo')); ?>"
                            <div id="emailHelp" class="form-text">No guardas fotos, guardas momentos para toda la vida.</div>
                            <p class="text-danger fst-italic"><?php echo e($errors-> first('txtTitulo')); ?></p>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"> Recuerdo: </label>
                            <input type="text" name="txtRecuerdo"class="form-control" id="exampleInputPassword1" value="<?php echo e(old('txtRecuerdo')); ?>">
                            <p class="text-danger fst-italic"> <?php echo e($errors-> first('txtRecuerdo')); ?></p>
                        </div>
                        
                </div>

                <div class="d-grid gap-2" >
                    <button type="submit" class="btn btn-primary" type="button">Guardar Recuerdos </button>

                    </form>
                </div>
            </form>

        </div><!--- div del card-->

    </div> <!--- div del container-->
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fer/pw182/laravel/resources/views/formulario.blade.php ENDPATH**/ ?>