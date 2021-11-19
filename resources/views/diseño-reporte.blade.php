<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>

    <style>
        :root{
            --tw-border-opacity: 1;
        }
        .logo{
            margin: auto;
            padding-top: 3rem;
            padding-left: 3rem;
            width: 8rem; 
            height: 8rem;
            object-fit: cover;
            float: left;
        }
        .usuario{
            padding-top: 3rem;
        }
        .datos{
            text-align: right;
            font-weight: 700;
            padding-right: 3rem;
        }
        .text-reporte{
            font-weight: 700;
            font-size: 3.75rem;
            line-height: 1;
            text-align: center;
        }
        .text-lista{
            font-weight: 200;
            font-size: 1.5rem;
            line-height: 2rem;
            text-align: center;
            text-decoration: underline;
            padding-top: 0.1rem;
        }
        .table{
            width: 100%;
        }
        .celda{
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            border: 1px solid rgb(0, 0, 0, var(--tw-border-opacity));
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <img class="logo" src="https://i.ytimg.com/vi/RNpUAlspnCg/maxresdefault.jpg" alt="">
    <div class="usuario datos">
        Usuario: Administrdor
    </div>
    <div class="datos">
        Fecha: 29/10/2021
    </div>
    <div class="datos">
        Hora: 18:00
    </div>
    <br>
    <br>
    <h1 class="text-reporte">Reporte</h1>
    <h5 class="text-lista">Lista del Personal</h5>
    <div>
        <table cellspacing="0" class="table">
            <thead>
                <tr>
                    <th class="celda">NRO</th>
                    <th class="celda">Nombres y Apellidos</th>
                    <th class="celda">CI</th>
                    <th class="celda">Correo</th>
                    <th class="celda">Teléfono</th>
                </tr>
            </thead>
    
            <tbody>
                <tr>
                    <td class="celda">1</td>
                    <td class="celda">Diego Hurtado</td>
                    <td class="celda">123456</td>
                    <td class="celda">Diego@gmail.com</td>
                    <td class="celda">77777777</td>
                </tr>
                <tr>
                    <td class="celda">2</td>
                    <td class="celda">Juanito Pérez</td>
                    <td class="celda">999999</td>
                    <td class="celda">juanito@gmail.com</td>
                    <td class="celda">71234567</td>
                </tr>
            </tbody>
        </table>
    </div>

</html>
