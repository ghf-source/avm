<?php
    date_default_timezone_set('America/Bogota');
	$fecha = time();
	$dia = date("d",$fecha);
	$mes = date("m",$fecha);
	$a = date("Y",$fecha);
	$hora = date("H",$fecha);
	$minutos = date("i",$fecha);
    if ($mes >= 9) {
        $a = $a + 1;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Asistente Virtual - Admisiones UNICAB</title>
    <link rel="icon" type="image/x-icon" href="favicon2025.ico">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="chatbot/librerias/bootstrap/css/bootstrap.css">
    
    <!-- Enlace al CSS del asistente -->
    <link rel="stylesheet" href="chatbot/css/chatbot_responsivo.css" />

    <!-- Jquery JS  -->
    <script src="chatbot/librerias/jquery-3.7.1.min.js"></script>

    <!-- EPAYCO  -->
    <script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
    
    <!-- Estilos generales del sitio -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
            font-size: 16px;
        }

        #header1 {
            background-color: #ffc107;
            color: white;
            text-align: center;
            padding: 1.5rem 1rem;
        }

        #header2 {
            background-color: white;
            color: black;
            text-align: center;
            padding: 1.5rem 1rem;
        }

        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }

        header p {
            margin: 0.5rem 0 0;
            font-size: 1rem;
            opacity: 0.9;
        }

        main {
            max-width: 80%;
            margin: 1.5rem auto;
            padding: 0 1rem;
        }

        .content {
            background: white;
            padding: 1.8rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .content h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #222;
        }

        .content p {
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        footer {
            text-align: center;
            padding: 1.2rem;
            background: #f1f1f1;
            font-size: 0.9rem;
            color: #666;
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 767px) {
            main {
                max-width: 90%;
                margin: 1rem auto;
                padding: 0 0.5rem;
            }
            header h1 {
                font-size: 1.4rem;
            }
            header {
                padding: 1.2rem 0.8rem;
            }
            header p {
                font-size: 0.9rem;
            }
            .content {
                padding: 1rem;
            }
            .content h2 {
                font-size: 1.3rem;
            }
        }

        @media (min-width: 768px) and (max-width: 992px) {
            main {
                max-width: 85%;
                margin: 1.2rem auto;
                padding: 0 0.8rem;
            }
            header h1 {
                font-size: 1.6rem;
            }
            header p,
            .content h2 {
                font-size: 1rem;
            }
            .content {
                padding: 1.2rem;
            }
            main {
                padding: 0 0.8rem;
                margin: 1rem auto;
            }
            footer {
                padding: 1rem;
                font-size: 0.85rem;
            }
        }
        
    </style>
</head>
<body>

    <!-- CABECERA DEL SITIO -->
    <header>        
        <div id="header2" class="header">
            <img src="chatbot/img/logo_nuevo.png" alt="Logo" class="logo">
            <span class="header-titulo"> Asistente Virtual de Admisiones<br>
            del Colegio UNICAB<br>
            Pago Deuda
            </span>
            <img src="chatbot/img/unibot1.png" alt="Bot" class="bot">
        </div>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main>
        <section class="content">
            <section class="section-title-pagos">
                <div class="container">
                    <div class="row align-items-center justify-content-center my-2">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-1"></div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                            <span class="h2-pagos">Pago a través de ePayco</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                            <img class="img-fluid h2-icon-pagos" src="https://unicab.org/homeunicabpro/assets/img/pagos/statement.png" alt="statement-icon">
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-1"></div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class='display-table'>
                                <div class='display-table-cell'>
                                    <div class='up-event-text'>
                                        <table>
                                            <tbody>
                                                <tr class="trtitulo">
                                                    <td colspan="3">MEDIO DE PAGO  (Efectivo --> Baloto, Efecty, Punto Red, Red Servi, Gana, etc...)</td>
                                                </tr>
                                                <tr id="trmediopago">
                                                    <td>
                                                        <select id="selmedio">
                                                            <option value="NA" selected>Seleccione medio de pago</option>
                                                            <option value="E">Efectivo</option>
                                                            <option value="P">PSE</option>
                                                            <option value="P6">PSE menor 60000</option>
                                                            <option value="TC">Tarjeta de crédito</option>
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="trespacio">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr class="trtitulo" id="tringvalor0">
                                                    <td colspan="3">DATOS PARA VALOR MANUAL</td>
                                                </tr>
                                                <tr id="tringvalor">
                                                    <td>
                                                        <label>* Documento estudiante</label><br/>
                                                        <input type="text" id="txtndoc" placeholder="Documento estudiante" onkeyup="validar_numero('txtndoc', 'Documento estudiante');"/>
                                                        <input type="hidden" style="width: 20px" id="ctr_txtndoc" value="1"/>
                                                        <br/><label>* Año</label><br/>
                                                        <input type="text" id="txtano" placeholder="Año" onkeyup="validar_numero('txtano', 'Año');"/>
                                                        <input type="hidden" style="width: 20px" id="ctr_txtano" value="1"/>
                                                        <br/><label>* Concepto de pago</label><br/>
                                                        <select id="selconcepto">
                                                            <option value="NA" selected>Seleccione concepto de pago</option>
                                                            <option value="m">Matrícula</option>
                                                            <!--<option value="mocp">Matrícula y otros cobros periódicos</option>-->
                                                            <option value="pm1">Pensión mes 1 (Febrero)</option>
                                                            <option value="pm2">Pensión mes 2 (Marzo)</option>
                                                            <option value="pm3">Pensión mes 3 (Abril)</option>
                                                            <option value="pm4">Pensión mes 4 (Mayo)</option>
                                                            <option value="pm5">Pensión mes 5 (Junio)</option>
                                                            <option value="pm6">Pensión mes 6 (Julio)</option>
                                                            <option value="pm7">Pensión mes 7 (Agosto)</option>
                                                            <option value="pm8">Pensión mes 8 (Septiembre)</option>
                                                            <option value="pm9">Pensión mes 9 (Octubre)</option>
                                                            <option value="pm10">Pensión mes 10 (Noviembre)</option>
                                                            <option value="ocp">Otros cobros periódicos</option>
                                                            <!--<option value="p">Póliza</option>-->
                                                            <option value="pp">Primer pago</option>
                                                            <option value="dg">Derechos de grado</option>
                                                            <!--<option value="icfes">ICFES</option>-->
                                                        </select>
                                                        <br/><label>* Ingrese valor a pagar</label><br/>
                                                        <input type="text" id="txtvalor" placeholder="Ingrese valor" onkeyup="validar_numero('txtvalor', 'Valor a pagar');"/>
                                                        <input type="hidden" style="width: 20px" id="ctr_txtvalor" value="1"/>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <br/><!--<label>Referencia de pago</label>--><br/>
                                                        <input type="text" id="txtref_valor" class="inactivo" placeholder="Refencia de pago" readonly/>
                                                    </td>
                                                </tr>
                                                <tr class="trespacio">
                                                    <td colspan="3"></td>
                                                </tr>
                                                <tr class="trtitulo">
                                                    <td colspan="3">DATOS DE QUIEN PAGA</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>* Nombre de quien paga</label><br/>
                                                        <input type="text" id="txtnom" placeholder="Nombre" onkeyup="mayus(this, 'txtnom', 'Nombre');"/>
                                                        <input type="hidden" style="width: 20px" id="ctr_txtnom" value="1"/>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <label>* Número de identificación</label><br/>
                                                        <input type="text" id="txtidentif" placeholder="Número de identificación" onkeyup="validar_numero('txtidentif', 'Número de identificación');"/>
                                                        <input type="hidden" style="width: 20px" id="ctr_txtidentif" value="1"/>
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table><br/><hr>
                                        <button id="btncontinuar" class="btn btn-brand" onclick="callEpayco()">Hacer pago por Epayco</button>
                                        <input type="hidden" id="txtcodfact" value="<?php //echo $codigo; ?>"/>
                                        <input type="hidden" id="txtconcepto"/>
                                        <input type="hidden" id="txtcontrolpago" value="0"/>
                                        <input type="hidden" id="txtidgrado" value="0"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            
        </section>
    </main>

    <!-- PIE DE PÁGINA -->
    <footer>
        &copy; <?= date('Y') ?> Colegio UNICAB Virtual. Todos los derechos reservados.
    </footer>

    <!-- CARGA DE SCRIPTS -->
    <!-- <script src="chatbot/pago.js"></script> -->

</body>
</html>