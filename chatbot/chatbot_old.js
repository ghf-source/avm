// asistente/asistente.js

document.addEventListener("DOMContentLoaded", () => {
    const botInicio = document.querySelector(".bot-inicio-inline");
    const asistenteSecciones = document.getElementById("asistente-secciones");
    const seccion1 = document.getElementById("seccion-1");
    const seccion2 = document.getElementById("seccion-2");
    const btnContinuar = document.getElementById("btn-continuar-seccion1");
    const btnFinalizar = document.getElementById("btn-finalizar");

    // Estado global
    let datosEstudiante = {
        nombre: "",
        edad: "",
        grado: ""
    };

    // Evento: Iniciar asistente
    botInicio.addEventListener("click", () => {
        asistenteSecciones.style.display = "block";
        botInicio.style.display = "none"; // Opcional: ocultar botón después de iniciar
    });

    // Evento: Continuar a la siguiente sección
    btnContinuar.addEventListener("click", () => {
        const acudienteNombre = document.getElementById("acudiente-nombre").value.trim();
        const acudienteCorreo = document.getElementById("acudiente-correo").value.trim();
        const acudienteTelefono = document.getElementById("acudiente-telefono").value.trim();
        const tipoEstudiante = document.querySelector('input[name="tipo-estudiante"]:checked')?.value;
        const estudianteNombres = document.getElementById("estudiante-nombres").value.trim();
        const estudianteApellidos = document.getElementById("estudiante-apellidos").value.trim();
        const estudianteDocumento = document.getElementById("estudiante-documento").value.trim();

        // Validación básica
        if (!acudienteNombre || !acudienteCorreo || !acudienteTelefono ||
            !tipoEstudiante || !estudianteNombres || !estudianteApellidos || !estudianteDocumento) {
            alert("Por favor, completa todos los campos.");
            return;
        }

        // Guardar datos (opcional)
        guardarDatosIniciales({
            acudiente: { acudienteNombre, acudienteCorreo, acudienteTelefono },
            estudiante: { tipoEstudiante, estudianteNombres, estudianteApellidos, estudianteDocumento }
        });

        // Mostrar resumen en sección 2
        document.getElementById("resumen-nombre").textContent = estudianteNombres + " " + estudianteApellidos;
        document.getElementById("resumen-edad").textContent = "No disponible"; // Puedes agregar campo de edad si lo necesitas
        document.getElementById("resumen-grado").textContent = "No disponible"; // Puedes agregar campo de grado si lo necesitas

        // Cambiar a sección 2
        seccion1.classList.remove("activa");
        seccion2.classList.add("activa");
    });

    // Evento: Finalizar
    btnFinalizar.addEventListener("click", () => {
        asistenteSecciones.style.display = "none";
        botInicio.style.display = "inline-flex"; // Volver a mostrar el botón
    });

    // Función para enviar datos a PHP
    function guardarDatosIniciales(datos) {
        fetch('asistente/guardar-acudiente.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                'acudiente_nombre': datos.acudiente.acudienteNombre,
                'acudiente_correo': datos.acudiente.acudienteCorreo,
                'acudiente_telefono': datos.acudiente.acudienteTelefono,
                'tipo_estudiante': datos.estudiante.tipoEstudiante,
                'estudiante_nombres': datos.estudiante.estudianteNombres,
                'estudiante_apellidos': datos.estudiante.estudianteApellidos,
                'estudiante_documento': datos.estudiante.estudianteDocumento
            })
        }).catch(err => console.log("Error al guardar:", err));
    }
});