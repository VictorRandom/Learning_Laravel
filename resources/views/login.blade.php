<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    @if (is_string($errors) && strlen($errors))
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

    <a href="{{url('register')}}" class="btn btn-primary mt-3">Cadastrar novo usuário</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

</body>
</html>