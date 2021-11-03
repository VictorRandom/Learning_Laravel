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

    <title>Editar Post</title>
</head>
<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Editar o Post {{ $post->id }}</a>
                <form method="post" action="logout" class='d-flex'>
                    {{ csrf_field() }}
                    <input type="submit" value="Logout" class="btn btn-primary"/>    
                </form>
        </div>
    </nav>

    <h1>Editar</h1>

    @if (is_string($errors) && strlen($errors))
    <div class="alert alert-danger">
        {{ $errors }}
    </div>
    @endif

    <form method="post" action="{{url('posts', [$post->id])}}">
        <input type="hidden" name="_method" value="put" />
        {{ csrf_field() }}
        <h2>Titulo atual: {{ $post->title }}</h2>
        <input type="text" class="form-control" name="title" id="id" placeholder="Digite o novo titulo">
        <h2>Descrição atual: {{ $post->description }}</h2>
        <input type="text" class="form-control" name="description" id="description" placeholder="Digite a nova descrição">
        <input type="submit" value="Editar" class="btn btn-success mt-3">
    </form>
    <form method="post" action="{{url('posts', [$post->id])}}">
        <input type="hidden" name="_method" value="delete" />
        {{ csrf_field() }}
        <input type="submit" value="Deletar" class="btn btn-danger mt-3">
    </form>

    <a href="{{url('home')}}" class="btn btn-warning mt-3">Retornar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>