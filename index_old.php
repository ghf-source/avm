<?php
// index.php - Colegio Virtual - Admisiones (versión final según captura)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Colegio Virtual - Admisiones</title>
    
    <!-- Enlace al CSS del asistente -->
    <link rel="stylesheet" href="chatbot/css/chatbot_responsivo.css" />
    
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

        header {
            background-color: #007bff;
            color: white;
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
            max-width: 800px;
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
        @media (max-width: 768px) {
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

        @media (max-width: 480px) {
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
    </style>
</head>
<body>

    <!-- CABECERA DEL SITIO -->
    <header>
        <h1>🎓 Colegio Virtual del Futuro</h1>
        <p>Formamos líderes con tecnología y valores</p>
    </header>

    <!-- CONTENIDO PRINCIPAL -->
    <main>
        <section class="content">
            <h2>Bienvenido a la Plataforma de Matrícula</h2>
            <p>
                Utiliza el asistente virtual en la esquina inferior derecha para comenzar el proceso de matrícula, resolver dudas o obtener información sobre costos y horarios.
            </p>
            <p>
                Nuestro colegio ofrece educación virtual desde grado primero hasta undécimo, con acompañamiento personalizado y plataforma 24/7.
            </p>

            <!-- Botón "Iniciar Asistente de Admisiones" dentro del contenido -->
            <div class="bot-inicio-inline">
                <img src="chatbot/img/unibot1.png" alt="Bot" class="boton-icono">
                <span class="btn-text">Iniciar Asistente de Admisiones</span>
            </div>

            <!-- Contenedor para las secciones del asistente (se mostrarán debajo) -->
            <div id="asistente-secciones" class="asistente-secciones">
                <!-- Sección 1: Datos del acudiente y estudiante -->
                <div id="seccion-1" class="seccion activa">
                    <h3>Datos del acudiente</h3>
                    <div class="form-group">
                        <label for="acudiente-nombre">Nombre completo</label>
                        <input type="text" id="acudiente-nombre" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="acudiente-correo">Correo electrónico</label>
                        <input type="email" id="acudiente-correo" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="acudiente-telefono">Teléfono</label>
                        <input type="tel" id="acudiente-telefono" class="form-control" />
                    </div>

                    <h3>Datos del estudiante</h3>
                    <div class="form-group">
                        <label>Tipo de estudiante</label>
                        <div>
                            <label><input type="radio" name="tipo-estudiante" value="antiguo"> Antiguo</label>
                            <label style="margin-left: 15px;"><input type="radio" name="tipo-estudiante" value="nuevo"> Nuevo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estudiante-nombres">Nombres</label>
                        <input type="text" id="estudiante-nombres" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="estudiante-apellidos">Apellidos</label>
                        <input type="text" id="estudiante-apellidos" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="estudiante-documento">Número de documento</label>
                        <input type="text" id="estudiante-documento" class="form-control" />
                    </div>

                    <button id="btn-continuar-seccion1" class="btn-primary">Continuar con la admisión</button>
                </div>

                <!-- Sección 2: Confirmación -->
                <div id="seccion-2" class="seccion">
                    <h2>✅ Matrícula completada</h2>
                    <p>Gracias por completar el proceso. Un asesor se contactará contigo en las próximas 24 horas.</p>
                    <p><strong>Nombre del estudiante:</strong> <span id="resumen-nombre"></span></p>
                    <p><strong>Edad:</strong> <span id="resumen-edad"></span></p>
                    <p><strong>Grado:</strong> <span id="resumen-grado"></span></p>
                    <button id="btn-finalizar" class="btn-primary">Finalizar</button>
                </div>
            </div>
        </section>
    </main>

    <!-- PIE DE PÁGINA -->
    <footer>
        &copy; <?= date('Y') ?> Colegio Virtual del Futuro. Todos los derechos reservados.
    </footer>

    <!-- CARGA DE SCRIPTS -->
    <script src="chatbot/chatbot.js"></script>

</body>
</html>