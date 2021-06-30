<?php
    
    function ConexionBaseDatos() {
        $servidor="localhost";
        $nombre_usuario="root";
        $password="";
        $base_de_datos="pagina_web";

        $con = mysqli_connect($servidor,$nombre_usuario,$password,$base_de_datos);
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        return $con;
    }

    function ConsultaProductos(){
        $sql = "SELECT * FROM producto";
        return  $sql;
    } 

    function ConsultaCategoria(){
        $sql = "SELECT * FROM categoria";
        return  $sql;
    } 

    function BuscarProducto($id_producto){
        $sql = "SELECT * FROM producto WHERE id_Producto = $id_producto" ;
        return  $sql;
    }

    function ConsultaComentario($id_producto){
        $sql = "SELECT * FROM Comentario WHERE id_Producto = $id_producto" ;
        return  $sql;
    }

    function AgregarComentario($con,$id_Producto){
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $puntaje =$_POST['puntaje'];
        $comentario = $_POST['comentario'];

        $sql = "INSERT INTO comentario(nombre, mail, puntaje, comentario, id_Producto)  
        VALUES ('$nombre', '$mail', '$puntaje', '$comentario','$id_Producto')";

        mysqli_query($con,$sql);
    }

    function ActualizarLike($con,$id_producto){
        $sql="UPDATE producto SET cant_like=cant_like + 1 WHERE id_Producto = $id_producto";
        mysqli_query($con,$sql);
    }
    
    function AgregarConsulta($con){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $mail = $_POST['mail'];
        $telefono = $_POST['telefono'];
        $mail_empresa = $_POST["area_empresa"];
        $comentario = $_POST['comentario'];

        $sql = "INSERT INTO Consulta(nombre, apellido, mail, telefono, area_empresa, comentario)  
        VALUES ('$nombre','$apellido','$mail', '$telefono', '$mail_empresa','$comentario')";
        mysqli_query($con,$sql);
    }
?>

