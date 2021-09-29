<style>
    #modal .modal-body {
        overflow: hidden;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form id="frm_provider" name="frm_provider" action="../Almacen/ajax/importacion.php?accion=ajax&procesar=frm_provider&opcion=i" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="descripcion">Razon Social</label>
                    <input type="text" name="descripcion" id="descripcion" size="30" pattern="([a-z0-9]{23}\s){1,}$/ig" title="Maximo 23 caracteres continuos" class="form-control" required aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="user@mail.com">
                </div>
                <div class="form-group">
                    <label for="telf">Teléfono</label>
                    <input type="text" name="telf" id="telf" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Persona Contacto</label>
                    <input type="text" name="contacto" id="contacto" class="form-control" placeholder="Pedro Perez" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Teléfono de Contacto</label>
                    <input type="text" name="telf_contacto" id="telf_contacto" class="form-control" required>
                </div>
            </form>
        </div>
    </div>
</div>