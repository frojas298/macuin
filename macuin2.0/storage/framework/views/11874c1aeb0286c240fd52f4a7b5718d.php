<?php $__env->startSection('titulo', 'Formulario'); ?>
    
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
                <div class="card-header text-dark fs-5 fw-semibold text-center">
                    Ingresa Datos del Ticket
                </div>
                
                <div class="card-body">

                    <form>

                        <div class="mb-3">
                            <label for="dropdownMenu" class="form-label">Clasificación : </label>
                            <select class="form-control" id="dropdownMenu" name="txtTitulo">
                                <option value="Falla de Office">Falla de Office</option>
                                <option value="2">Fallas en la Red</option>
                                <option value="3">Errores de Software</option>
                                <option value="4">Errores de Hardware</option>
                                <option value="5">Mantenimientos preventivos</option>
                                <option value="6">Otros</option>
                            </select>
<!--                             <input type="text" name="txtTitulo" class="form-control" value="<?php echo e(old('txtTitulo')); ?>">
                            <div id="emailHelp" class="form-text">Selecciona la clasificación que sea acorde al problema.</div>
                            <p class="text-danger fst-italic"><?php echo e($errors-> first('txtTitulo')); ?></p> -->
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"> Detalles : </label>
                            <input type="text" name="txtRecuerdo"class="form-control" id="exampleInputPassword1" value="<?php echo e(old('txtRecuerdo')); ?>">
                            <p class="text-danger fst-italic"> <?php echo e($errors-> first('txtRecuerdo')); ?></p>
                        </div>
                        
                </div>

                <div class="d-grid gap-3" >
                    <button type="submit" class="btn btn-outline-primary">Guardar Ticket</button>

                    </form>
                </div>
            </form>

        </div><!--- div del card-->

    </div> <!--- div del container-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/fer/pw182/macuin2.0/resources/views/formulario.blade.php ENDPATH**/ ?>