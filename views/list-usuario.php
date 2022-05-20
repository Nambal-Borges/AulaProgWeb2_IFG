<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Models\Usuario;
use App\Controllers\UsuarioController;
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<?php
    include_once "menu.php";

?>
<div class="container">
    <br><br><br><br>
    <div class="row">
        <?php

            $listaUsuarios = UsuarioController::getInstance()->listar();







        ?>

        <table class="table table-hover">
            <thead class="center">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>

                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($listaUsuarios as $usuario){
                    echo "<tr>
                            <th>".$usuario->getNome()."</th>
                            <th>".$usuario->getEmail()."</th>
                            <th>".$usuario->getTelefone()."</th>
                            
                        </tr>";
                }


            ?>

            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>