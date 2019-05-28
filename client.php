<?php
    session_start();


    if(! isset($_SESSION['admin'] ) ){
        header('location:login.html');
    }

    
    include 'server/conexion.php';

    $conexionBD = new conectarBD();

    $mostrar = 'SELECT * FROM cliente';

    $sentencia_mostrar = $conexionBD -> prepare($mostrar);
    $sentencia_mostrar -> execute();

    $res = $sentencia_mostrar -> fetchAll();

    //cerrar conexion
    $sentencia_mostrar = null;
    $mbd = null;

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <link rel="icon" href="img/log2.png">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,600,700|Roboto:300,400,500,700" rel="stylesheet">
    <!-- end fonts -->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/client.css">
</head>
<body>
    <!-- header -->
    <header class="header">
        <nav class="menu">
            <ul>
                <li>
                    <a href="">registro</a>
                </li>
                <li>
                    <a href="">agregar cliente</a>
                </li>
                <li>
                    <a href="">Buscar</a>
                </li>
                <li>
                    <a href="">Perfil</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- header end -->

    <!-- records -->
    <section class="records">
                <h1 class="title">Registro Clientes</h1>
            <div class="container">
                <figure class="logo">
                    <img src="img/log2.png" alt="logo">
                </figure>
            
                <div class="client">
                    <table>
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Sede</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Correo</th>
                                <th>Elinibar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php  foreach($res as $data):  ?>
                            <tr>
                                <td><?php echo $data['cc_nit'] ?></td>
                                <td><?php echo $data['nombre'] ?></td>
                                <td><?php echo $data['apellido'] ?></td>
                                <td><?php echo $data['sede'] ?></td>
                                <td><?php echo $data['telefono'] ?></td>
                                <td><?php echo $data['direccion'] ?></td>
                                <td><?php echo $data['ciudad'] ?></td>
                                <td><?php echo $data['correo'] ?></td>
                                <td>
                                    <a href="server/client/deleteClient.php?usuario_id=<?php echo $data['cc_nit'] ?>" > 
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
        </div>

    </section>
    <!-- records end -->

    <!-- create -->
    <section class="create">
        <h2>Agregar Cliente</h2>

        <form  method="POST" action="server/client/insertClient.php">

            <div class="create-container">
                    <div class="u-box">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required>                
                        </div>
                
                        <div class="u-box">
                            <label for="Apellido">Apellido</label>
                            <input type="text" name="apellido" required>
                        </div>
                
                        <div class="u-box">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" required>
                        </div>
                
                        <div class="u-box">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" required>
                        </div>

                        <div class="u-box">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" required>
                        </div>
                
                        <div class="u-box">
                            <!-- <label for="sede">Sede</label>
                            <input type="text" name="sede"> -->
                            <select name="sede" required>
                                <option value="1">Sede 1</option>
                                <option value="2">Sede 2</option>
                                <option value="3">Sede 3</option>
                                <option value="4">Sede 4</option>
                            </select>
                        </div>
            
                        <div class="u-box">
                                <label for="cc_nit">Cedula</label>
                                <input type="text" name="cc_nit" required>
                        </div>
                        <div class="u-box">
                                <label for="cuidad">Ciudad</label>
                                <input type="text" name="ciudad" required>
                        </div>
            
            </div>
            
            <div class="buttom">
                <button type="submit" >Agregar</button>
            </div>
        </form>    

    </section>
    <!-- create end -->

    <!-- search -->
    <section class="search">
        <h2 class="search-title">Buscar</h2>
        <h4>Bucar por:</h4>
        <article >

            <form class="search-container" id="search">

                <div class="u-box">
                    <label for="search-cc_nit">Cedula</label>
                    <input type="number" name="search-cc_nit">
                </div>

                <div class="u-box">
                    <label for="search-nombre">Nombre</label>
                    <input type="text" name="search-nombre">
                </div>

                <div class="u-box">
                    <label for="search-apellido">Apellido</label>
                    <input type="text" name="search-apellido">
                </div>

                <div class="u-box">
                    <select name="search-sede" required>
                        <option value="1">Sede 1</option>
                        <option value="2">Sede 2</option>
                        <option value="3">Sede 3</option>
                        <option value="4">Sede 4</option>
                    </select>
                </div>

                <div class="u-box">
                    <label for="search-telefono">Telefono</label>
                    <input type="number" name="search-telefono">
                </div>

                <div class="u-box">
                    <label for="search-direccion">Dirección</label>
                    <input type="text" name="search-direccion">
                </div>

                <div class="u-box">
                    <label for="search-ciudad">Ciudad</label>
                    <input type="text" name="search-ciudad">
                </div>

                <div class="u-box">
                    <label for="search-correo">Correo</label>
                    <input type="email" name="search-corre">
                </div>

                <div class="buttom">
                    <button type="submit" id="btn-search">Buscar</button>
                </div>
            </form>

        </article>

    </section>
    <!-- search end -->
    <a href="server/closed.php">cerrar secion</a>

    <script src="js/search.js"></script>
</body>
</html>