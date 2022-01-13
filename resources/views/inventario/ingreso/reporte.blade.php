<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif; 
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }

        #logo{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }

        #imagen{
        width: 100px;
        }

        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }

        #encabezado{
        text-align: center;
        margin-left: 10%;
        margin-right: 35%;
        font-size: 15px;
        }

        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        }

        section{
        clear: left;
        }

        #cliente{
        text-align: left;
        }

        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 15px;
        }

        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }

        #facliente thead{
        padding: 20px;
        background: #2183E3;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }

        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        text-align: center;
        }

        #facvendedor thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }

        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facarticulo{
        text-align: center;
        }

        #facarticulo thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }

        #gracias{
        text-align: center; 
        }
    </style>
    <body>
        @foreach ($venta as $v)
        <header>
            <div id="logo">
                <img src="logo_2.png" alt="incanatoIT" id="imagen">
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b>Farmacia Rosalfar</b><br>Av 3 anillo Externo, esquina japon <br>Telefono: 3434322<br>Santa Cruz de la Sierra
                </p>
            </div>
            <div id="fact">
                <p>{{$v->tipo_comprobante}}<br>
                {{$v->serie_comprobante}}-{{$v->num_comprobante}}</p>
            </div>
        </header>

        <section>
            <div>
                <table id="facliente">
                    <thead>                        
                        <tr>
                            <th id="fac">Proveedor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><p id="cliente">Nombre: {{$v->nombre}}<br>
                            Direccion: {{ $v->direccion }}<br>
                            Teléfono: {{$v->numero}}<br>
                            Email: {{$v->correo}}</</p></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        @endforeach
        <br>
        <section>
            <div>
                <table id="facvendedor">
                    <thead>
                        <tr id="fv">
                            <th>Empleado</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$v->emnom . ' ' . $v->emape}}</td>
                            <td>{{$v->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <section>
            <div>
                <table id="facarticulo" class="table table-striped">
                    <thead>
                        <tr id="fa">
                          <th>Producto</th>
                          <th>Formato</th>
                          <th>Dosis</th>
                          <th>Cantidad</th>
                          <th>Precion Uni</th>
                          {{-- <th>Descuento</th> --}}
                          <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr>
                          <td>{{$det->articulo}}</td>
                          <td>{{$det->fornom}}</td>
                          <td>{{$det->dosis}}</td>
                          <td>{{$det->cantidad}}</td>
                          <td>{{$det->precio}}</td>
                          {{-- <td>{{$det->descuento}}</td> --}}
                          <td>{{($det->cantidad*$det->precio)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @foreach ($venta as $v)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            {{-- <th></th> --}}
                            <th>SubTotal</th>
                            {{ $tot = round(($v->total_ingreso*$v->impuesto)/100) }}
                            <td>$ {{ $v->total_ingreso - $tot}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            {{-- <th></th> --}}
                            <th>Impuesto({{ $v->impuesto }}%)</th>
                            <td>$ {{round(($v->total_ingreso*$v->impuesto)/100)}}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            {{-- <th></th> --}}
                            <th>Total</th>
                            <td>$ {{$v->total_ingreso}}</td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <div id="gracias">
                <p><b>Gracias por su compra!</b></p>
            </div>
        </footer>
    </body>
</html>