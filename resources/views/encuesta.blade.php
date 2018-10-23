<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background:#ddd;">

<section class='container' style="background:#fff;min-height:100vh;">
    <br>
    <h4>SISTEMA PARA RESPUESTAS DE GOOGLE FORM</h4>
    <p>Use este sistema con precausión</p>
    <hr>

    <form class="form-inline justify-content-sm-end" enctype="multipart/form-data" action="{{ route('procesar') }}"  name="formUpload" method="post" >
        @csrf
        <input type="file"   id="file-encuesta" style='display:none' name='encuesta'>
        <label tabindex="0" for="file-encuesta" class="btn btn-primary btn-sm" style='color:white'>[+] Agregar Encuesta</label>
    </form>
    <br>
    @if (count($data))
    <table class='table'>
        <thead>
            <tr>
                <th>Nombre de encuesta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $encuesta)
            <tr>
                <td> {{ $encuesta->nombre }} </td>
                <td> <a href="#" class='link'> Eliminar </a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else 
    <div class="card" style='background:#f1f2f3'>
        <p style='padding:20px;'>No hay encuestas registradas</p>
    </div>
    @endif 
</section>

<script>

var fileencuesta = document.getElementById("file-encuesta");
fileencuesta.addEventListener("change", function(event){
    document.formUpload.submit();
});


</script>
</body>
</html>