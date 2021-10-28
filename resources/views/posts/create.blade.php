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

    <title>Novo Post</title>
</head>
<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Posts e Comentarios</a>
                <form method="post" action="logout" class='d-flex'>
                    {{ csrf_field() }}
                    <input type="submit" value="Logout" class="btn btn-primary"/>    
                </form>
        </div>
    </nav>

    @if (is_string($errors) && strlen($errors))
    <div class="alert alert-danger">
        {{ $errors }}
    </div>
    @endif


    <form method='post' action="{{url('post')}}">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="title" class="form-label">Digite o titulo do novo Post</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Novo Post">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição do novo Post</label>
            <textarea class="form-control" id="description" name="description" type="text" rows="3"></textarea> 
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

</body>
</html>