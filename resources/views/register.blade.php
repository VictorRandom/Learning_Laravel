<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

    <title>Cadastrar novo usuário</title>

</head>
<body>

    <h1>Cadastro de novo usuário</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method='post' action="{{url('register')}}" id="form-register">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Nome: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            <div class="invalid-feedback" id="invalid-name">
               O nome é inválido
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email: </label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <div class="invalid-feedback" id="invalid-email">
                Este e-mail está inválido
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha: </label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <div class="invalid-feedback" id="invalid-password">
                A senha não corresponde aos critérios
            </div>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Senha: </label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype the Password" required>
            <div class="invalid-feedback" id="invalid-password_confirmation">
                A senha não corresponde aos critérios
            </div>
        </div>
        <input type="submit" value="Enviar" id='submit' class="btn btn-success mt-3">
    </form>

    <a href="{{url('login')}}" class="btn btn-warning mt-3">Retornar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{asset('js/validation.js')}}">
    </script>

</body>
</html>