<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    @if (isset($errors))
    <div class="alert alert-danger">
        {{ $errors }}
    </div>
    @endif

    <form method="post" action="login">
        {{ csrf_field() }} 

        <label for="email">Login: </label>
        <input name="email" type="text" id="email" placeholder="E-mail" />
        <label for="password">Password: </label>
        <input name="password" id="password" type="password" placeholder="Senha" />
        <input type="submit" value="Enviar" />
    </form>
</body>
</html>