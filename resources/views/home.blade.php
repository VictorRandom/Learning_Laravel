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

    <title>Posts e Comentarios</title>
</head>
<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Posts e Comentarios</a>
                <form method="post" action="{{url('logout')}}" class='d-flex'>
                    {{ csrf_field() }}
                    <input type="submit" value="Logout" class="btn btn-primary"/>    
                </form>
        </div>
    </nav>

    
    <div class="container">    
        <h1>Pagina inicial</h1>
        <p>Bem vindo {{ $user->name }}</p>
                    
        @foreach ($posts as $post)
            <div class="card mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <hr>
                    <small>Comentario</small>
                    <hr>
                    <a href="{{url('posts', [$post->id])}}" class="btn btn-primary">Ver detalhes do Post</a>
                    @if(isset($post->can_edit) && $post->can_edit === true)
                        <a href="{{url('posts/edit', [$post->id])}}" class="btn btn-info">Editar</a>
                    @endif
                </div>
            </div>
        @endforeach

        <a href="{{url('posts/create')}}" class="btn btn-primary mt-3">Novo Post</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</body>
</html>