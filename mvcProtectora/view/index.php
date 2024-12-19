<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Perros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <!--el fondo se cambia aqui en lo de bg cambias el url por lo que tu quieras solo tienes que cambiar lo de bg lo de background image lo que pasa es que he intentado un css externo pero no funciona-->
<div id="bg" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-image: url('/mvcProtectora/uploads/fondos/verano.gif');
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
        "></div>
<?php session_start();?>
        <div class="container">
        <div class="d-flex justify-content-end py-3">
        <?php if (!isset($_SESSION["usuario"])): ?>
            <a href="/mvcProtectora/view/registrarse.html" class="btn btn-warning me-2">Regístrate</a>
            <a href="/mvcProtectora/view/login.html" class="btn btn-primary">Iniciar Sesión</a>
            <?php endif; ?>
            <?php if (isset($_SESSION["usuario"])): ?>
            <a href="/mvcProtectora/view/cerrar-session.php" class="btn btn-primary">Cerrar sesion</a>
            <?php endif; ?>
        </div>

            <div class="row">
                <div class="col-4 me-3">
                <h1 class="text-center mb-4" style="color:blue;">Perros</h1>
                                    <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "animalia"): ?>
                        <button onclick="window.location.href='/mvcProtectora/index.php/alta';">Añadir</button>
                    <?php endif; ?>
                    <div class="d-flex justify-content-center align-items-center">
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>sexo</th>
                                <th>Imagen</th>
                                <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "animalia"): ?>
                                <th>Baja<th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rowset as $row): ?>
                            <tr>
                                <td><?php echo $row->getNombre() ?></td>
                                <td><?php echo $row->getSexo() ?></td>

                                <td><img src="/mvcProtectora/uploads/<?php echo $row->getImg() ?>" width="80px" height="80px"></td>
                                <?php if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == "animalia"): ?>
                                <form action="/mvcProtectora/index.php/baja" method="POST">
                                    <td>
                                        <button type="submit" name="id" value="<?php echo $row->getId(); ?>">Eliminar</button>
                                    </td>
                                
                                </form>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    </div>

                </div>
                <div class="col-7">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form action="/mvcProtectora/index.php/post" method="POST">
            <button type="submit">Nuevo post</button>
        </form>
        <?php foreach ($blogRowset as $blogrow): ?>
            <div class="card mb-4" style="width: 35rem;">
                <div class="card-header">
                    <h5><?php echo $blogrow->getTitulo(); ?></h5>
                    <small><?php echo $blogrow->getFecha(); ?></small>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $blogrow->getComentario(); ?></p>
                </div>
                <div class="card-footer" >
                    <img  src="/mvcProtectora/uploads/<?php echo $blogrow->getImg(); ?>" alt="Imagen del post" class="img-fluid">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
            </div>
                    <!--
CREATE DATABASE IF NOT EXISTS refugio_animales;
USE refugio_animales;

CREATE TABLE animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    sexo ENUM('Macho', 'Hembra') NOT NULL,
    descripcion TEXT,
    img VARCHAR(255)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comentario TEXT,
    img VARCHAR(255)
);

INSERT INTO animales (nombre, sexo, descripcion, img) VALUES
('Max', 'Macho', 'Un perro enérgico y amigable.', 'max.jpg'),
('Luna', 'Hembra', 'Una gata cariñosa y tranquila.', 'luna.jpg'),
('Rocky', 'Macho', 'Un conejo juguetón y curioso.', 'rocky.jpg');
</p>
        
        <p></p>
        <p></p>
        <p></p>
    
     Bootstrap JS (Opcional para interactividad) 
             <h1>copia y pega la sql para tener la base de datos</h1>-->
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>