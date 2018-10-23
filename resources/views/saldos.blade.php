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

    <table class='table'>
        <thead>
            <tr>
                <th>Nombres</th>
                <th>codigo</th>
                <th>saldo</th>
                <th>estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saldos as $saldo)
            <tr>
                <td> {{ $saldo->NOMBRES }} </td>
                <td> {{ $saldo->TARCODIGO }} </td>
                <td> {{ $saldo->TARSALDOS  }} </td>
                <td> {{ $saldo->ALUESTADO  }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

<script>



</script>
</body>
</html>