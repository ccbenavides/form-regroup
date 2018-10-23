<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,900" rel="stylesheet">
    <style>
        *{
            font-family: 'Roboto'
        }
        .respuesta_cabezera{
            margin-top:30px;
        }
        .respuesta{
            margin:0 10px;
            padding:8px 10px;
        }
        .respuesta:nth-child(2n+2){
            background: #f1f2f3;
        }
        .container{

        }
        body{
            background: #f1f2f3;
        }
        @media print
        {    
            body{
                -webkit-print-color-adjust: exact; 
                background: #fff;
            }
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>
    <title>{{ str_slug($encuesta . "-" . $coordinador->nombre)  }}</title>
</head>
<body>

<section class='container' style="background:#fff;min-height:100vh;">
    <br>
    <h4>{{ $encuesta }}</h4>
    <br>
    <p>Coordinador : <b>{{ $coordinador->nombre }}</b></p>
    @foreach($preguntas as $pregunta)
        <h5 class='respuesta_cabezera'>{{ $pregunta->nombre }}</h5>
        @foreach ($pregunta->respuestas()->where('coordinador_id', $coordinador->id)->get() as $respuesta)
            <p class='respuesta'>
                {{ $respuesta->respuesta }}
            </p>
        @endforeach
    @endforeach


</section>


</body>
</html>