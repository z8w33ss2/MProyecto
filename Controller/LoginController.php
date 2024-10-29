<?php
// ***************************En el controlador es donde aplico la logica de negocio******************

    //echo $_SERVER["DOCUMENT_ROOT"]; //muestra la ruta del origen
    include_once $_SERVER["DOCUMENT_ROOT"] .'/Proyecto_Clase/Model/LoginModel.php'; // Controlador llama al modelo

    // Variable de sesion en servidor con PHP  (guardar cosas importantes)
    // variable de sesion en el navedor con javascript (guardar cosas poco importantes es visible)
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Crear o leer una variable de sesion VALIDAR 
    }

    // isset pregunta si hay una peticion hecha a $_POST["btnIniciarSesion"]
    // $_POST["name"] es el conjunto de datos que estan viajando desde la vista hasta el controlador
    // dentro del $_POST["name"] vienen todos los datos que estan dentro del formulario
    
    if(isset($_POST["btnIniciarSesion"]))
    {
        //Código de acción
        $correo = $_POST["txtCorreo"]; // En php se utiliza el name
        $contrasenna = $_POST["txtContrasenna"];

        $result = IniciarSesionModel($correo, $contrasenna);

        // result.num_rows para saber si encontro registros
        if($result != null && $result -> num_rows > 0)
        {
            // guarda los datos en la variable datos para manipular el array
            $datos = mysqli_fetch_array($result);

            $_SESSION["NombreUsuario"]= $datos["Nombre"]; // variable de sesion en el servidor
            header('location: ../../View/home.php');
        }
        else
        {
            // Limpiar variables de sesion 
            session_destroy();
            $_POST["txtMensaje"]= "Su información no se ha validado correctamente";
        }
    }
    
    // php tomamos el name - Condicional para cerrar sesion
    if (isset($_POST["btnCerrarSesion"])) {
        session_destroy();
        header('location: ../View/home.php');
    }

    if(isset($_POST["btnRegistrarUsuario"]))
    {
        //Código de acción
        $identificacion = $_POST["txtIdentificacion"]; // En php se utiliza el name
        $nombre = $_POST["txtNombre"];
        $correo = $_POST["txtCorreo"];
        $contrasenna = $_POST["txtContrasenna"];

        $result = RegistrarUsuarioModel($identificacion,$nombre,$correo,$contrasenna);

        if($result == true)
        {
            header('location: ../../View/Login/inicioSesion.php');
        }
        else
        {
            $_POST["txtMensaje"]= "Su información no se ha registrado correctamente";
        }
    }

    if(isset($_POST["btnRecuperarAcceso"]))
    {
        //Código de acción
        $correo = $_POST["txtCorreo"]; // En php se utiliza el name

        $result = RecuperarAccesoModel($correo);
        
        // result.num_rows para saber si encontro registros
        if($result != null && $result -> num_rows > 0)
        {
            // guarda los datos en la variable datos para manipular el array
            $datos = mysqli_fetch_array($result);

            // Generador de codigo aleatorio
            $codigo = GenerarCodigo();

            //Paso 1 Metodo para actualizar la contraseña en la base de datos
            ActualizarContrasennaModel($datos["Consecutivo"], $codigo);

            //Paso 2 Enviar el correo electronico
            $asunto = "Recuperación de Contraseña";
            $destinatario = $correo;
            $contenido =
            "<htlm>
                <!--Estilos basicos en la linea-->
                <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; padding: 20px;'>
                    <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
                        <h2 style='color: #333;'>Recuperación de Contraseña</h2>
                        
                        <p>Hola,".$datos["Nombre"]."</p>
                        
                        <p>Hemos recibido una solicitud para restablecer tu contraseña. Si no solicitaste este cambio, puedes ignorar este correo electrónico.</p>
                        
                        <p>Para recuperar tu contraseña, haz clic en el botón de abajo:</p>
                        
                        <p style='text-align: center;'>
                            <a href='http://localhost:81/Proyecto_Clase/View/Login/InicioSesion.php' style='display: inline-block; padding: 12px 24px; font-size: 16px; color: #ffffff; background-color: #007bff; text-decoration: none; border-radius: 5px;'>Recuperar Contraseña</a>
                        </p>
                        
                        <p>Este enlace expirará en 24 horas.</p>
                        
                        <p>Saludos,<br>El equipo de SEODash</p>
                        
                        <p style='font-size: 12px; color: #888; text-align: center;'>Este es un correo automático, por favor no respondas a este mensaje.</p>
                    </div>
                </body>
            </html>";

            // Metodo que envia el correo
            EnviarCorreo($asunto,$contenido,$destinatario);

            header('location: ../../View/Login/inicioSesion.php');
        }
        else
        {
            // Limpiar variables de sesion 
            session_destroy();
            $_POST["txtMensaje"]= "Su información no se ha validado correctamente";
        }
    }

    // Funcion que permite generar codigo aleatorio
    function GenerarCodigo() {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    // Funcion que permite enviar correos electronicos
    
    function EnviarCorreo($asunto,$contenido,$destinatario)
    {
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        

        $correoSalida = "csolis30278@ufide.ac.cr";
        $contrasennaSalida = "PBjK2ly9vY4E*%";

        $mail = new PHPMailer();
        $mail -> CharSet = 'UTF-8';

        $mail -> IsSMTP();
        $mail -> IsHTML(true); 
        $mail -> Host = 'smtp.office365.com'; 
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;                  
        $mail -> SMTPAuth = true;
        $mail -> Username = $correoSalida;               
        $mail -> Password = $contrasennaSalida;                                
        
        $mail -> SetFrom($correoSalida);
        $mail -> Subject = $asunto;
        $mail -> MsgHTML($contenido);   
        $mail -> AddAddress($destinatario);

        // Activar el modo de depuración
        //$mail->SMTPDebug = 2;  // Cambia este valor según el nivel de detalle que quieras

        // Enviar el correo y verificar si se produjo algún error
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    }
?>