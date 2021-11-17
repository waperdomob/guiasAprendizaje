<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="{{ env('APP_URL') }}/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>GUIAPDF</title>
</head>
<body>

    <center><h1>Guia de Aprendizaje</h1></center><br><br>    

    <center><h3>{{ $datos['nombre'] }}</h3></center><br><br><br><br>   
        
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>instructor</th>
                <th>Tema</th>
                <th>Entrega</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($instructor as $name)
                    <td>{{ $name->name }}</td>
                @endforeach
                <td>{{ $datos['tema'] }}</td>
                <td>{{ $datos['duracion'] }} horas</td>
            </tr>
        </tbody>
        
    </table>
    <br>
    <h4>Descripción</h4>

    <p>{{ $datos['descripcion'] }}</p>
    <br>

    <h4>Procedimiento</h4>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dicta quis repellat illum vero veritatis, omnis quaerat, sit rerum iste sed odit eligendi id laboriosam? Laudantium, tempore eaque! Sed, odit?
    </p>

    <br>

    <h5>Requisitos</h5>
    <ul >
        <li class="list-group-item list-group-item-primary">An item</li>
        <li class="list-group-item list-group-item-primary">A second item</li>
        <li class="list-group-item list-group-item-primary">A third item</li>
        <li class="list-group-item list-group-item-primary">A fourth item</li>
        <li class="list-group-item list-group-item-primary">And a fifth one</li>
      </ul>

</body>
</html>