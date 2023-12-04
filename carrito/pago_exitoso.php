<?php
// Incluir configuración y conexión a la base de datos si es necesario
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';  // Incluir la cabecera si es necesario
?>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Pago Exitoso!</h1>
    <hr class="my-4">
    <p class="lead">Gracias por tu compra. Tu pago se ha procesado con éxito.</p>
    
    <!-- Aquí podrías incluir información adicional sobre la transacción o agradecimientos específicos -->

    <?php
    // Si tienes información adicional para mostrar, puedes incluirla aquí
    ?>

    <!-- Puedes proporcionar un enlace para que el usuario regrese a la página principal o a otra sección de tu sitio -->
    <a class="btn btn-primary btn-lg" href="index.php" role="button">Volver a la página principal</a>
</div>

<?php
// Incluir el pie de página si es necesario
include 'templates/pie.php';
?>
