<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido</title>
</head>
<body>
    <h1>Has recibido un nuevo mensaje</h1>
    <p>
        Nombre: {{ $msg->nombre }} <br>
        Email: {{ $msg->email }} <br>
        Mensaje: {{ $msg->mensaje }}
    </p>
</body>
</html>