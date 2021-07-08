<?php
    require_once('../inc/func/funciones.php');
    require_once('../inc/func/conexionBaseDatos.php');
    $con = ConexionBaseDatos();
    $id_producto=$_REQUEST['variable'];
    $Resul_Pro = $con-> query(BuscarProducto($id_producto));
    $producto = mysqli_fetch_array($Resul_Pro);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/e15e8c34af.js" crossorigin="anonymous"></script>
        <title>ZonaGamer_Producto</title>
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../estilos/estilos.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    
    </head>
    <body>
    <header id="header"></header>
    <script src="../JS/Header.js"> </script>
    
        <main>
        <section class="container seccion">
            <h1 class="mt-md-3  mt-3 text-titulo">Detalles del producto</h1>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div>
                        <img class="card-img-top" src=<?php print("../".$producto['foto']) ?> alt="">
                        <p>Nombre del producto: <?php print($producto['nombre']) ?></p>
                        <p>Marca: <?php print($producto['marca']) ?></p>
                        <p>Precio: $<?php print($producto['precio']) ?> </p>
                        <p>Descripcion: <?php print($producto['descripcion']) ?> </p>
                        <p>Para ver los detalles del producto en pdf haga click <a href="../inc/func/ZonaGamer_pdf.php?variable=<?php echo $id_producto ?>">aca</a></p>
                        <?php 
                        if(session_status() == 2){?>
                            <button class="like__btn">
                            <span id="icon"><i class="far fa-thumbs-up"></i></span>
                            <span id="count"><?php print($producto['cant_like']) ?></span> Like
                        </button> 
                        
                        
                        <script> 
                            const likeBtn = document.querySelector(".like__btn");
                            let likeIcon = document.querySelector("#icon"),
                            count = document.querySelector("#count");

                            let clicked = false;
                            likeBtn.addEventListener("click", () => {
                            if (!clicked) {
                                clicked = true;
                                likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i>`;
                                count.textContent++;
                            } else {
                                clicked = false;
                                likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i>`;
                                count.textContent--;
                            }
                            });
                        </script>
                        
                        <?php }?>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div>  
                        <h3 class="h2">Deja tu comentario</h3>
                        <form action=""<?php echo $_SERVER['PHP_SELF']; ?>  method="post" onsubmit="return confirm('¿Queres enviar el comentario?');">
                            <p>Nombre: <input type="text" name="nombre" required></p>
                            <p>Mail: <input type="text" name="mail" required></p>
                            <p>Puntaje: 
                                <select name="puntaje">
                                    <option value="1" selected="selected">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select> <br><br>
                            </p>
                            <p>Comentario: </p>
                            <textarea name="comentario" placeholder="Comentario" cols="40" rows="4" required></textarea><br><br>
                            <input type="submit" name="submit" value="Enviar">  
                        </form>              
                    </div> 
                    <?php 
                        if (isset($_POST["submit"])) {
                            AgregarComentario($con,$id_producto);
                        }
                        $Resul_Con = $con -> query(ConsultaComentario($id_producto));
                        MostrarComentarios($Resul_Con);
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
