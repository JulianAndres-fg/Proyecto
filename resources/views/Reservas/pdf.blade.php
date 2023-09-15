<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin-bottom: 10px;
            font-size: 16px;

        }

        .header {
            background-color: #93d864;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .reservation-details {
            border: 1px solid #ddd;
            padding: 20px;
        }

        .hotel-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: right
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .text {
            color: white
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 class="text">Recibo de Reserva</h1>
    </div>
    <div class="reservation-details">
        <h2>Detalles de la Reserva</h2>
        <p><strong>Cod de la reserva:</strong> {{ $reserva->reserva_cod }}</p>
        <p><strong>Cedula del Cliente:</strong> {{ $reserva->cliente_id }}</p>
        <p><strong>Nombre del Cliente:</strong>
            @foreach ($clientes as $cliente)
                @if ($cliente->cliente_cedula == $reserva->cliente_id)
                    {{ $cliente->cliente_nombre }}
                @endif
            @endforeach
        </p>
        <p><strong>Fecha de Llegada:</strong> {{ $reserva->reserva_fech_ini }}</p>
        <p><strong>Fecha de Salida:</strong> {{ $reserva->reserva_fech_fin }}</p>
        <p><strong>Nombre del usuario:</strong>
            @foreach ($usuarios as $usuario)
                @if ($usuario->id === $reserva->usuario_id)
                    {{ $usuario->name }}
                @endif
            @endforeach
        </p>
        <p><strong>Fecha de registro:</strong> {{ $reserva->reserva_fech_registro }}</p>
        <p><strong>Domo reservado:</strong>
            @foreach ($domos as $domo)
                @if ($domo->domo_cod === $reserva->domo_id)
                    {{ $domo->domo_nombre }}
                @endif
            @endforeach
        </p>


        <p><strong>Metodo de Pago:</strong>
            @foreach ($metodos_de_pagos as $metodo_de_pago)
                @if ($metodo_de_pago->metodo_de_pago_cod == $reserva->metodo_de_pago_id)
                    {{ $metodo_de_pago->metodo_de_pago_nombre }}
                @endif
            @endforeach
        </p>
        <p><strong>Servicios:</strong><br>
            <ul>
            @foreach ($servicios as $index => $servicio)
                @if ($reserva->servicio->contains('servicio_cod', $servicio->servicio_cod))
                      <li> {{ $servicio->servicio_nombre }} (${{ number_format($servicio->servicio_precio, 0, '.', ',') }})</li><br>
                @endif
            @endforeach
        </ul>
        </p>

    </div>
    <div class="hotel-info">
        <p><strong>Descuento:</strong> {{ $reserva->reserva_descuento }}%</p>
        <p><strong>Subtotal:</strong> ${{ number_format($reserva->reserva_subtotal, 0, '.', ',') }}</p>
        <p><strong>IVA:</strong> ${{ number_format($reserva->reserva_iva, 0, '.', ',') }}</p>
        <p><strong>Total:</strong> ${{ number_format($reserva->reserva_total, 0, '.', ',') }}</p>
    </div>
    <div class="footer">
        <p>¡Gracias por elegir nuestro Glamping! Esperamos que disfrute de su estancia.</p>
    </div>
</body>

</html>
