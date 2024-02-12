Seccion del cliente para crear tickets

(Representacion de un form solo para verfificar que funciona)
<form action="{{ url('/cliente') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <label for="Clasificacion">{{'Clasificación'}}</label>
    <input class="form-control" type="text" name="Clasificacion" id="Clasificacion" value="" required>

    <label for="Detalles">Detalles</label>
    <textarea class="form-control" name="Detalles" id="Detalles" required></textarea>

    <input type="submit" value="Agregar">
</form>