<?php  
    require_once('../inc/func/funciones.php');
    require_once('../inc/func/conexionBaseDatos.php');
    $con = ConexionBaseDatos();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/e15e8c34af.js" crossorigin="anonymous"></script>
        <title>ZonaGamer_Contacto</title>
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos/estilos.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
    <header id="header"></header>
    <script src="../JS/Header.js"> </script>
    <main>
        <section class="container seccion">
            <h1 class="mt-md-3  mt-3 text-titulo">Contacto</h1>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div>
                        <h2>Datos del local</h2>
                        <p><i class="far fa-clock"></i> Horario: Lunes a Sábados de 10 a 20 hs</p>
                        <p><i class="fas fa-mobile-alt"></i> Teléfono: 0800-123-1234</p>
                        <p><i class="fas fa-map-marked"></i> Dirección: Florida 537, Galeria Jardin, Local 123 </p>
                        <div class="embed-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13136.412312619494!2d-58.3748054!3d-34.6015549!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x66ea6e648f46a49a!2zR2FsZXLDrWEgSmFyZMOtbg!5e0!3m2!1ses!2sar!4v1596148176816!5m2!1ses!2sar"  allowfullscreen="" aria-hidden="true" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div>
                        <h3 class="h2">Consultas Generales</h3>
                        <div class="row">
                            <form action="" <?php echo $_SERVER['PHP_SELF']; ?> method="post" onsubmit="return confirm('¿Queres enviar el mensaje?');">
                                <p>Nombre: <input type="text" name="nombre"  required></p>
                                <p>Apellido: <input type="text" name="apellido" required></p>
                                <p>Mail: <input type="text" name="mail"  required></p>
                                <p>Telefono: <input type="text" name="telefono" ></p>
                                <p>Área de la empresa : <select name="area_empresa" >
                                        <option value="Ventas" selected="selected">Ventas</option>  
                                        <option value="Consultas">Consultas</option>
                                        <option value="Reclamos">Reclamos</option>
                                    </select> <br><br>
                                </p>
                                <p>Comentarios</p>
                                <textarea name="comentario" placeholder="Comentario" cols="40" rows="4" required></textarea><br><br>
                                <input type="submit" name="submit" value="Enviar">
                            </form>
                        </div>
                    </div>
                    <?php
                        if (isset($_POST["submit"])) {
                            AgregarConsulta($con);
                            EnviarMensaje();
                        }
                    ?>
                </div>
            
            </div>
        </section>
    </main>
    <footer id="piepagina"></footer>
    <script src="../JS/footer.js"></script>
    <script src="../lib/jquery/jquery-3.3.1.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>



