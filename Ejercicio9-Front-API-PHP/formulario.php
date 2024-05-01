<form id="formularioMantenimiento" action="" method="post" class="d-flex justify-content-center gap-3" enctype="multipart/form-data">
    <div class="d-flex flex-column">
        <img id="foto" width="250px" onerror="this.src='./fotos/nofoto.webp';" src="" alt="">
        <input type="file" name="nuevaFoto" id="nuevaFoto" onchange="cargafoto()">
    </div>
    <div class="d-flex flex-column">
        <div class="my-2">
            <label for="id">Id:</label>
            <input name="id" id="id" type="text">
        </div>
        <div class="my-2">
            <label for="nombre">Nombre:</label>
            <input name="nombre" id="nombre" type="text">
        </div>
        <div class="my-2">
            <label for="apellidos">Apellidos:</label>
            <input name="apellidos" id="apellidos" type="text">
        </div>
        <div class="my-2">
            <label for="email">Email:</label>
            <input name="email" id="email" type="text">
        </div>
        <div class="my-2">
            <label for="telefono">Telefono:</label>
            <input name="telefonos" id="telefono" type="text">
        </div>
        <div class="my-2">
            <label for="web">WEB:</label>
            <input name="web" id="web" type="text">
        </div>
        <div class="d-flex justify-content-around">
            <input id="botonAceptar" type="button" value="Aceptar">
            <input type="reset" value="Cancelar">
        </div>
    </div>
</form>