<!-- Modal -->
<div class="modal fade" id="editar{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="/recuerdo/{{$item->id}}/confirm">
            @csrf <!-- token de seguridad-->

            <div class="card-header text-secondary fs-5 fw-semibold text-center">
                Introduce tus recuerdos aqui
            </div>
            
            <div class="card-body">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titulo: </label>
                    <input type="text" name="txtTitulo" class="form-control" value="{{$item->titulo}}"> <!-- Es para mantener los caracteres -->
                    <p class='text-danger fst-italic'> {{ $errors->first('txtTitulo') }} </p>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Recuerdo: </label>
                    <input type="text" name="txtRecuerdo"class="form-control" value="{{$item->recuerdo}}">
                    <p class='text-danger fst-italic'> {{ $errors->first('txtRecuerdo') }} </p>
                </div>
                    
            </div>
    </div>
    <div class="modal-footer">
    <div class="card-footer text-body-secondary">
            <button type="submit" class="btn btn-secondary">Editar Recuerdo</button>
            </div>
        </form>

      </div>

    </div>
    
  </div>
</div>



<!-- Modal Eliminar -->
<div class="modal fade" id="deleteModal{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Item</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <form method="POST" action="/recuerdo/{{$item->id}}/delete">
            @csrf <!-- token de seguridad-->
            @method('DELETE')

                <div class="card-header text-primary fs-5 fw-semibold text-center">
                    ¿Borrar recuerdo?
                </div>
                
                <div class="card-body">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titulo: </label>
                        <input type="text" name="txtTitulo" class="form-control" value="{{($item->titulo)}}" readonly> <!-- Es para mantener los caracteres -->
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Recuerdo: </label>
                        <input type="text" name="txtRecuerdo"class="form-control" value="{{($item->recuerdo)}}" readonly>
                    </div>
                        
                </div>

    </div>

    <div class="modal-footer">
        
                <div class="card-footer text-body-secondary">
                    <button type="submit" class="btn btn-danger">Si, Borrar</button>
                </div>

            </form>


                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" > Cancelar </button>
        </div>

    </div>

</div>
</div>