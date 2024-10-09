<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Proyecto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Proyecto</h1>
        <form action="{{ route('proyectos.update', $proyectos->id) }}" method="POST"> <!-- Asegúrate de pasar el ID -->
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text">Id</span>
                <input type="text" name="id" id="id" class="form-control" value="{{ $proyectos->id }}" readonly> <!-- No editable -->
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Título</span>
                <input type="text" name="titulo" id="titulo" value="{{ $proyectos->titulo }}" class="form-control">
            </div>
            <div class="input-group">
                <span class="input-group-text">Descripción</span>
                <textarea name="descripcion" id="descripcion" class="form-control" aria-label="With textarea">{{ $proyectos->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
