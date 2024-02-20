<!-- Modal -->
<div class="modal fade" id="editar<?php echo e($item->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="/recuerdo/<?php echo e($item->id); ?>/confirm">
            <?php echo csrf_field(); ?> <!-- token de seguridad-->

            <div class="card-header text-secondary fs-5 fw-semibold text-center">
                Ingresa los datos del Ticket a editar
            </div>
            
            <div class="card-body">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Clasificacion : </label>
                    <select class="form-select" name="txtTitulo" value="<?php echo e(old('txtTitulo')); ?>">
                                <option value="Falla de Office">Falla de Office</option>
                                <option value="Fallas en la Red">Fallas en la Red</option>
                                <option value="Errores de Software">Errores de Software</option>
                                <option value="Errores de Hardware">Errores de Hardware</option>
                                <option value="Otros">Otros</option>
                    </select>
                    <!-- <input type="text" name="txtTitulo" class="form-control" value="<?php echo e($item->titulo); ?>"> --> <!-- Es para mantener los caracteres -->
                    <p class='text-danger fst-italic'> <?php echo e($errors->first('txtTitulo')); ?> </p>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Detalles : </label>
                    <input type="text" name="txtRecuerdo"class="form-control" value="<?php echo e($item->recuerdo); ?>">
                    <p class='text-danger fst-italic'> <?php echo e($errors->first('txtRecuerdo')); ?> </p>
                </div>
                    
            </div>
    </div>
    <div class="modal-footer">
    <div class="card-footer text-body-secondary">
            <button type="submit" class="btn btn-warning">Editar Ticket</button>
            </div>
        </form>

      </div>

    </div>
    
  </div>
</div>



<!-- Modal Eliminar -->
<div class="modal fade" id="deleteModal<?php echo e($item->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Borrar Ticket</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form method="POST" action="/recuerdo/<?php echo e($item->id); ?>/delete">
            <?php echo csrf_field(); ?> <!-- token de seguridad-->
            <?php echo method_field('DELETE'); ?>

                <div class="card-header text-primary fs-5 fw-semibold text-center">
                    ¿Borrar Ticket?
                </div>
                
                <div class="card-body">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Clasificacion : </label>
                        <input type="text" name="txtTitulo" class="form-control" value="<?php echo e(($item->titulo)); ?>" readonly> <!-- Es para mantener los caracteres -->
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Detalles : </label>
                        <input type="text" name="txtRecuerdo"class="form-control" value="<?php echo e(($item->recuerdo)); ?>" readonly>
                    </div>
                        
                </div>

    </div>

    <div class="modal-footer">
        
                <div class="card-footer text-body-secondary">
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </div>

            </form>


                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" > Cancelar </button>
        </div>

    </div>

</div>
</div><?php /**PATH /Users/fer/pw182/Macuin_new/resources/views/partials/modal.blade.php ENDPATH**/ ?>