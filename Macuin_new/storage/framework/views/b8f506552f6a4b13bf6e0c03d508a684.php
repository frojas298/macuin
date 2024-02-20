<?php $__env->startSection('titulo', 'Formulario Ticket'); ?>
    
<?php $__env->startSection('contenido'); ?>

    <h1 class="display-1 text-center text-dark ">Crear Ticket</h1>

    <div class="container mt-5" style="margin: 100">

        <?php if(session()->has('confirmacion')): ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
         <strong><?php echo e(session('confirmacion')); ?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <div class="card ">
            <form method="post" action="/recuerdo">
              <?php echo csrf_field(); ?> 
                <div class="card-header text-secondary fs-5 fw-semibold text-center">
                    Ingresa los datos para crear Ticket.
                </div>
                
                <div class="card-body">

                    <form>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Clasificacion : </label>
                            <select class="form-select" name="txtTitulo" value="<?php echo e(old('txtTitulo')); ?>">
                                <option value="Falla de Office">Falla de Office</option>
                                <option value="Fallas en la Red">Fallas en la Red</option>
                                <option value="Errores de Software">Errores de Software</option>
                                <option value="Errores de Hardware">Errores de Hardware</option>
                                <option value="Otros">Otros</option>
                            </select>
                            <div id="emailHelp" class="form-text">Introduce el tipo de falla que presentas.</div>
                            <p class="text-danger fst-italic"><?php echo e($errors-> first('txtTitulo')); ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"> Detalles : </label>
                            <input type="text" name="txtRecuerdo"class="form-control" id="exampleInputPassword1" value="<?php echo e(old('txtRecuerdo')); ?>">
                            <p class="text-danger fst-italic"> <?php echo e($errors-> first('txtRecuerdo')); ?></p>
                        </div>
                        
                </div>

                <div class="d-grid gap-2" >
                    <button type="submit" class="btn btn-outline-success">Crear Ticket.</button>

                    </form>
                </div>
            </form>

        </div><!--- div del card-->

    </div> <!--- div del container-->
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fer/pw182/Macuin_new/resources/views/formulario.blade.php ENDPATH**/ ?>