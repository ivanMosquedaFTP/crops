<?php require('views/header.php'); ?>
<center>
    <h1>Nuevo invernadero</h1>
</center>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <form action="invernadero.php?accion=nuevo" method="post">
            <div class="mb-3">
                <label for="inputNombre" class="form-label">Nombre del invernadero</label>
                <input type="text" name="data[invernadero]" id="inputNombre" placeholder="Escribe aqui el nombre" class="form-control"/>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">latitud del invernadero</label>
                <input type="text" name="data[latitud]" id="" placeholder="Escribe aqui la latitud del invernadero" class="form-control"/>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">longitud del invernadero</label>
                <input type="text" name="data[longitud]" id="" placeholder="Escribe aqui la longitud del invernadero" class="form-control"/>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Area del invernadero(m<sup>2</sup>)</label>
                <input type="number" name="data[area]" id="" placeholder="Escribe aqui el area del invernadero" class="form-control"/>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Fecha de creacion del invernadero(m<sup>2</sup>)</label>
                <input type="date" name="data[fecha_creacion]" id="" class="form-control"/>
            </div>

            <input type="submit" value="Guardar" name="data[enviar]" class="btn btn-primary w-100">
        </form>
    </div>
    <div class="col-md-1"></div>
</div>

<?php require('views/footer.php'); ?>