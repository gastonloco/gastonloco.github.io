(function () {
    'use strict'

    const formsRegistro = document.querySelectorAll('.needs-validation-registro')

    Array.prototype.slice.call(formsRegistro)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                validarNombre()
                validarApellido()
                validarContraseña()
                validarRepetirContraseña()
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                alert("Operación exitosa.")
            }, false)
        })

    const formsLogin = document.querySelectorAll(".needs-validation-login")

    Array.prototype.slice.call(formsLogin)
        .forEach(function (form) {
            form.addEventListener("submit", function (event) {



                validarContraseña()
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')

            })
        })

    const formsReserva = document.querySelectorAll(".needs-validation-reserva")
    Array.prototype.slice.call(formsReserva)
        .forEach(function (form) {
            form.addEventListener("submit", function (event) {



                validarFecha()
                validarHora()
                validarCantidadDePersonas()

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')

            })
        })

    function validarNombre() {
        const txtNombre = document.getElementById("txt-nombre")
        const nombre = txtNombre.value
        const valido = nombre != null && nombre.length > 2
        if (!valido) {
            txtNombre.setCustomValidity("Ingrese un nombre de mas de dos caracteres!")
        } else {
            txtNombre.setCustomValidity("")
        }

        return valido
    }
    function validarApellido() {
        const txtApellido = document.getElementById("txt-apellido")
        const apellido = txtApellido.value
        const valido = apellido != null && apellido.length > 2
        if (!valido) {
            txtApellido.setCustomValidity("Ingrese un apellido de mas de dos caracteres!")
        } else {
            txtApellido.setCustomValidity("")
        }
        return valido
    }

    function validarContraseña() {
        const txtContraseña = document.getElementById("txt-contraseña")
        const contraseña = txtContraseña.value
        const valido = contraseña != null && contraseña.length > 7
        if (!valido) {
            txtContraseña.setCustomValidity("Ingrese una contraseña de más de ocho caracteres!")
        } else {
            txtContraseña.setCustomValidity("")
        }
        return valido
    }
    function validarRepetirContraseña() {
        const txtRepContraseña = document.getElementById("txt-repcontraseña")
        const repContraseña = txtRepContraseña.value
        const txtContraseña = document.getElementById("txt-contraseña")
        const contraseña = txtContraseña.value
        const valido = repContraseña == contraseña
        if (!valido) {
            txtRepContraseña.setCustomValidity("La contraseña no coincide")
        } else {
            txtRepContraseña.setCustomValidity("")
        }
        return valido
    }

    function validarFecha() {
        const txtFecha = document.getElementById("txt-fecha")
        const fecha = txtFecha.value
        const valido = esFechaValida(fecha)
        if (!valido) {
            txtFecha.setCustomValidity("Fecha no válida!")
        } else {
            txtFecha.setCustomValidity("")
        }
        return valido
    }

    function validarHora() {
        const txtHora = document.getElementById("txt-hora")
        const hora = txtHora.value
        const txtFecha = document.getElementById("txt-fecha")
        const fecha = txtFecha.value
        const valido = esHoraValida(hora, fecha)
        if (!valido) {
            txtHora.setCustomValidity("Hora no válida!")
        } else {
            txtHora.setCustomValidity("")
        }
        return valido
    }

    function validarCantidadDePersonas() {
        const txtCantidadPersonas = document.getElementById("txt-personas")
        const cantidadPersonas = txtCantidadPersonas.value
        const valido = +cantidadPersonas > 0 && cantidadPersonas < 100
        if (!valido) {
            txtCantidadPersonas.setCustomValidity("Ingrese una cantidad de personas mayor a cero y menor a cien")
        } else {
            txtCantidadPersonas.setCustomValidity("")
        }
        return valido
    }


    function esFechaValida(fecha) {
        const componentesFecha = fecha.split("-");

        const ahora = new Date();
        const mayorIgualQueActual =
            +componentesFecha[2] >= ahora.getDate() &&
            +componentesFecha[1] >= ahora.getMonth() + 1 &&
            +componentesFecha[0] >= ahora.getFullYear();
        return mayorIgualQueActual;
    }

    function esFechaMayorQueActual(fecha) {
        const componentesFecha = fecha.split("-");

        const ahora = new Date();
        const mayorQueActual =
            +componentesFecha[2] > ahora.getDate() &&
            +componentesFecha[1] > ahora.getMonth() + 1 &&
            +componentesFecha[0] > ahora.getFullYear();
        return mayorQueActual;
    }

    function esHoraValida(hora, fecha) {
        const componentesHora = hora.split(":");
        const ahora = new Date();
        const mayorQueActual =
            (+componentesHora[0] > ahora.getHours() &&
                +componentesHora[1] > ahora.getMinutes()) ||
            +componentesHora[0] > ahora.getHours()

        return esFechaMayorQueActual(fecha) || mayorQueActual;
    }

    function obtenerFechaCompleta(fecha, hora) {
        const componentesFecha = fecha.split("-");
        const componentesHora = hora.split(":");

        const dia = +componentesFecha[2];
        const mes = +componentesFecha[1];
        const anio = +componentesFecha[0];

        const horas = +componentesHora[0];
        const minutos = +componentesHora[1];

        return new Date(anio, mes - 1, dia, horas, minutos);
    }

})()


function redirigirAlIndex() {
    window.setTimeout(function () {
        window.location = "index.html";
    }, 5000);
}

function toggleMenu() {
    const menu = document.getElementsByClassName("menu")[0];
    menu.classList.toggle("open")
}
