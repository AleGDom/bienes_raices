<?php 
    require 'includes/app.php';

    incluirTemplate('header');

?>
    <main class="contenedor seccion">
        <h2>Contacto</h2>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>

        <h3>Llene el formulario</h3>
        <form action="" class="formulario">
            <fieldset>
                <legend>Informacion personal</legend>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" placeholder="Tu nombre">

                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" placeholder="Tu email">

                <label for="tel">E-Mail</label>
                <input type="tel" name="tel" id="tel" placeholder="Tu Telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="" cols="30" rows="10"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opt">Vende o compra</label>
                <select name="opt" id="opt">
                    <option selected value="" disabled>-- Seleccione --</option>
                    <option value="vende">Vende</option>
                    <option value="compra">Compra</option>
                </select>

                <label for="precio">Precio o Presupuesto</label>
                <input type="number" name="precio" id="precio">
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">Email</label>
                    <input type="radio" name="contacto" id="contactar-email" value="email">
                </div>
                <p>Si eligio telefono, eliga fecha y hora</p>

                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date">

                    <label for="time">Hora</label>
                    <input type="time" name="time" id="time" min="9:00" max="18:00">
            </fieldset>

            <input class="boton-verde" type="submit" value="Enviar">
        </form>
    </main>

    <?php 
        incluirTemplate('footer'); 
    ?>
    
  
</body>
</html>