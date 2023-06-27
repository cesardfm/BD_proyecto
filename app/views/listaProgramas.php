<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/listaProgramas.css" type="text/css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/infoProgramas.css">
</head>

<body>
    <div id="container-absoluto" style="display: none;position:absolute;z-index:100;width:100%;height:100%">
        <div id="mensajes">PROGRAMA ELIMINADO CORRECTAMANETE</div>
        <div class="container-info" style="display:flex;">

        </div>
    </div>
    <div class="container-table">
        <table class="table table-hover table-test">
            <thead>
                <tr>
                    <th scope="col"># SNIES</th>
                    <th scope="col">PROGRAMA</th>
                    <th scope="col">INSTITUCION</th>
                    <th scope="col">CIUDAD</th>
                    <th scope="col">MODALIDAD</th>
                    <th style="width: 300px" scope="col">ELIMINAR / ACTUALIZAR / INFO</th>
                </tr>
            </thead>
            <tbody id="agregar-programas">
            </tbody>
        </table>
    </div>
    <script src="../assets/code.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="../assets/programas.js"></script>
</body>

</html>