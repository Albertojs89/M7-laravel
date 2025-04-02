<!-- filepath: /workspace/resources/views/sumar.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de Números</title>
</head>
<body>
    <h1>Suma de Dos Números</h1>
    <form action="/sumar" method="POST">
        @csrf
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required>
        <br><br>
        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required>
        <br><br>
        <button type="submit">Sumar</button>
    </form>

    @if (isset($resultado))
        <h2>El resultado de la suma es: {{ $resultado }}</h2>
    @endif
</body>
</html>
