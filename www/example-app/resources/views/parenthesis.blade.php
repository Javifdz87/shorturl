<!-- formulario.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Cadena</title>
</head>
<body>
<h1>Validar Cadena</h1>

@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif
<form action="{{ route('validar') }}" method="POST">
    @csrf
    <label for="cadena">Ingrese la cadena a validar:</label><br>
    <input type="text" id="cadena" name="cadena"><br><br>
    <button type="submit">Validar</button>
</form>
</body>
</html>
