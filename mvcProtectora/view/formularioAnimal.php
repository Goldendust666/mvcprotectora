<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-image: url('/mvcProtectora/uploads/verano.gif');
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
        }

        .form-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: white;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div id="bg"></div>
    <div class="form-container">
        <h2 class="text-center mb-4">Nuevo post</h2>
        <form method="post" action="/mvcProtectora/index.php/nuevoPost" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentarios:</label>
                <textarea class="form-control" name="comentarios" id="comentario" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Imagen:</label>
                <input type="file" name="imagenBlog" class="form-control-file" id="img" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
