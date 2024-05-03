<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5D383D;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-container h2 {
            margin-top: 0;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-container p {
            font-size: 16px;
            color: #666;
            text-align: center;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-content {
            flex: 1;
            margin-right: 10px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 120px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .success-message {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .error-message {
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Contactanos</h2>
        <p>Periodico El Faro</p>

        <form method="post" autocomplete="off">

            <div class="form-group">

                <div class="form-content">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Nombre">
                </div>
                <div class="form-content">
                    <label for="email">Correo</label>
                    <input type="text" id="email" name="email" placeholder="Correo">
                </div>
            </div>
            <div class="form-group">

                <div class="form-content">
                    <label for="direction">Direccion</label>
                    <input type="text" id="direction" name="direction" placeholder="Direccion">
                </div>
                <div class="form-content">
                    <label for="phone">Telefono</label>
                    <input type="text" id="phone" name="phone" placeholder="Telefono">
                </div>
            </div>

            <label for="message">Mensaje</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Mensaje"></textarea>

            <input class="btn" type="submit" name="contact" value="Enviar Mensaje">



        </form>
    </div>

</body>


</html>

<?php
include("conexion.php");

if (isset($_POST["contact"])) {
    if (
        strlen($_POST["name"]) >= 1 &&
        strlen($_POST["email"]) >= 1 &&
        strlen($_POST["direction"]) >= 1 &&
        strlen($_POST["phone"]) >= 1 &&
        strlen($_POST["message"]) >= 1

    ) {
        
        {
        $name= trim($_POST["name"]);
        $email= trim($_POST["email"]);
        $direction= trim($_POST["direction"]);
        $phone= trim($_POST["phone"]);
        $mesagge= trim($_POST["message"]);
        $fecha= date("d/m/y");

        $consulta="INSERT INTO datos(nombre, email, direccion, telefono, mensaje, fecha)
        VALUES ('$name', '$email', '$direction','$phone', '$mesagge', '$fecha')";
        $resultado = mysqli_query($conex, $consulta);
        if($resultado){
            ?>
            <h3 class="success">Tu registro se a completado</h3>

            <?php
        }
        else{
            ?>
            <h3 class="error">Ocurrio un error</h3>

            <?php
        }
    }
} 
}
    ?>