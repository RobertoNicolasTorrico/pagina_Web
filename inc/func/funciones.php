<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require('PHPMailer-master\src\PHPMailer.php');
require('PHPMailer-master\src\Exception.php');
require('PHPMailer-master\src\SMTP.php');

function Incremento($array){

    $num=count($array);
    $num=$num+1;
    return $num;
}

function ObtenerCategoria(){

    $id_cat = '1';
    if (isset($_GET['id_categoria']))
        $id_cat = $_GET['id_categoria'] ;

    return $id_cat;
}

function MostrarComentarios($Resul_Con){
                    
    while ($comentarios=mysqli_fetch_array($Resul_Con)) {
        ?>
           <p> <b>Nombre:</b> <?php print($comentarios['nombre']) ?> ||
           <b>Puntuacion:</b> <?php print($comentarios['puntaje']) ?>
           </p>
           <p>
           <b> Comentario: </b><?php print($comentarios['comentario']) ?>
           </p>
      
     <?php 
     }
}



function EnviarMensaje(){

    $mail = new PHPMailer();
    $mail->SMTPDebug  = 0;
    $mail->Host       = 'smtp.gmail.com';
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->Username   ="";//email
    $mail->Password   = "";//contraseña
    $mail->SetFrom('',  $_POST["nombre"].' '.$_POST["apellido"]);
    $mail->AddAddress('', 'El Destinatario');
    $mail->Subject = 'Asunto: '.$_POST["area_empresa"];
    $mail->Body = 
                    'Nombre y apellido: '. $_POST["nombre"].' '.$_POST["apellido"]. "\n".
                    'Asunto: '.$_POST["area_empresa"]."\n".
                    'Mail: '. $_POST["mail"]."\n".
                    'Telefono: '. $_POST["telefono"]."\n".
                    'Comentario: '. $_POST["comentario"];
    if(!$mail->Send()) {
      echo "Error: " . $mail->ErrorInfo;
    } else {
      echo "Mensaje enviado";
    }
}









?>