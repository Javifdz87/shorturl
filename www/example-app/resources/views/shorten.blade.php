<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acortar URL</title>
</head>
<body>
<h1>Acortar URL</h1>
<form action="{{ route('shorten') }}" method="post">
    @csrf
    <label for="url">URL:</label>
    <input type="text" id="url" name="url">
    <button type="submit">Acortar</button>
</form>
</body>
</html>
