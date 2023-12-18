<?php

    use App\Vendedores;

    $vendedores=Vendedores::all();
     

?>
<fieldset>
            <legend>Informacion General de la propiedad</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad" value="<?php echo $propiedad->titulo; ?>">

            <label for="precio">precio:</label>
            <input type="text" name="precio" id="precio" placeholder="Precio de la propiedad" value="<?php echo s($propiedad->precio); ?>">

            <label for="img">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <?php if($propiedad->imagen && file_exists(CARPETA_IMAGENES.$propiedad->imagen)): ?>
                <img src="/bienes_raices/imagenes/<?php echo $propiedad->imagen?>" alt="" class="imagen-small">
            <?php endif; ?>

            <label for="desc">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo s($propiedad->descripcion); ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input type="number" name="habitaciones" id="rooms" max="9" min="1" value="<?php echo s($propiedad->habitaciones); ?>">
            <label for="wc">WC</label>
            <input type="wc" name="wc" id="rooms" max="9" min="1" value="<?php echo s($propiedad->wc); ?>">
            <label for="estacionamiento">Estacionamiento</label>
            <input type="estacionamiento" name="estacionamiento" id="rooms" max="9" min="1" value="<?php echo s($propiedad->estacionamiento); ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedores_id" id="vendedor">
                <option value="" selected disabled>-- Selecciona --</option>
                <?php foreach($vendedores as $vendedor): ?>
                    <option value=" <?php echo $vendedor->id ?>"  <?php echo $propiedad->vendedores_id==$vendedor->id ? "selected" : ''?> > <?php echo $vendedor->nombre.' '.$vendedor->apellido; ?> </option>
                <?php endforeach;?>
            </select>
            
        </fieldset>