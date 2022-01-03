<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reporte de reserva</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" media="screen">
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 1cm 1cm 1cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #e2cc06;
            color: black;
            text-align: center;
            line-height: 35px;
        }

        p {
            text-align: left;
        }

        h4 {
            text-align: center;
            font-size: 20px;
            font-weight: bolder;
            text-decoration: underline;
        }

        tr:nth-child(even) {
            background-color: #ddd;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        span {
            font-weight: bold;
        }

        img {
            margin: auto;
            display: block;
            width: 7rem;
            height: 7rem;
            position: absolute;
            padding-left: 35rem;
        }

        table {
            border-top-width: 0px;
            border-bottom-width: 1px;
            border-color: rgb(17 24 39);
        }

    </style>
    <style>
        .datagrid table {
            border-collapse: collapse;
            text-align: left;
            width: 100%;
        }

        .datagrid {
            font: normal 12px/150% Arial, Helvetica, sans-serif;
            background: #fff;
            overflow: hidden;
        }

        .datagrid table td,
        .datagrid table th {
            padding:
                20px 0px;
        }

        .datagrid table thead {
            border-bottom: solid 5px #0F362D;
        }

        .datagrid table thead th {
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D',
                    endColorstr='#275420');
            background-color: #246355;
            color: #000000;
            font-size: 13px;
            font-weight: bold;
            border-left: 0px solid #36752D;
            text-align: left;
        }

        .datagrid table thead tr th {
            color: white;
        }

        .datagrid table thead th:first-child {
            border: none;
        }

        .datagrid table tbody td {
            color: #000000;
            font-size: 13px;
            font-weight: normal;
        }

        .datagrid table tbody .alt td {
            background: #DFFFDE;
            color: #22ff00;
        }

        .datagrid table tbody td:first-child {
            border-left: none;
        }

        .datagrid table tbody tr:last-child td {
            border-bottom:
                none;
        }

        .datagrid table tfoot td div {
            border-top: 1px solid #000000;
            background: #DFFFDE;
        }

        .datagrid table tfoot td {
            padding: 0;
            font-size: 12px
        }

        .datagrid table tfoot td div {
            padding: 2px;
        }

        .datagrid table tfoot td ul {
            margin: 0;
            padding: 0;
            list-style: none;
            text-align: right;
        }

        .datagrid table tfoot li {
            display: inline;
        }

        .datagrid table tfoot li a {
            text-decoration: none;
            display: inline-block;
            padding: 2px 8px;
            margin: 1px;
            color: #FFFFFF;
            border: 1px solid #36752D;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420));
            background: -moz-linear-gradient(center top, #36752D 5%, #275420 100%);
            filter: prog
        }

    </style>

</head>

<body>

    <main>
        <h4>Urbanización Los Pinos</h4>
        <img class="logo" src="https://i.ytimg.com/vi/RNpUAlspnCg/maxresdefault.jpg" alt="">

        <p> <span>Usuario:</span> {{ auth()->user()->name }}. <br><span>Fecha:</span> {{ now()->format('Y-m-d') }}.
            <br><span>Hora:</span> {{ now()->format('H:i') }}.
        </p>
        <h4>REPORTE: <br> reserva: {{ $reserva->id }}</h4>

        <p>
            <span>Datos de la reserva:</span> <br>
            <span>Código de reserva:</span> {{ $reserva->id }}. <br>
            <span>Nombre del residente:</span> {{ $reserva->Vresidente->nombre }}. <br>
            <span>Nombre del área común</span> {{ $reserva->VareaComun->nombre }}. <br>
            <span>Fecha:</span> {{ $reserva->fecha }}. <br>
            <span>Hora del inicio:</span> {{ $reserva->horaIni }}. <br>
            <span>Hora del final:</span> {{ $reserva->horaFin }}. <br>
        </p>
        <span>Permisos del reporte:</span>
        @if ($reportes->count() > 0)
            @foreach ($reportes as $reporte)
                <p>- {{ $reporte->descripcion }}.</p>
            @endforeach
        @else
            <p> No hay reportes. </p>
        @endif

        <span>Lista de invitados</span> <br>
        <div class="datagrid">
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre del visitante</th>
                        <th>Número de carnet</th>
                        <th>Hora de ingreso</th>
                        <th>Hora de salida</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lista as $persona)
                        <tr>
                            <td>{{ $persona->id }}</td>
                            <td> {{ $persona->nombre }}</td>
                            <td> {{ $persona->nroCarnet }}</td>
                            <td>
                                @if ($persona->invitado->horaIngreso)
                                    {{ $persona->invitado->horaIngreso }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($persona->invitado->horaSalida)
                                    {{ $persona->invitado->horaSalida }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
