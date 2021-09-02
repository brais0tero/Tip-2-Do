import "./jquery-3.6.0.min.js";

$(document).ready(function () {

    // Comprobar correo en Login
    $("#Logcorreo").blur(function () {
        let parente = $(this).parent();
        let contenido = $(this).val();
        if (contenido == "") {
            $("#errorCorreo")
                .css('display', 'inline-block')
                .text("Correo Vacio");
            if (parente.children().hasClass("bg-success")) {
                parente.children().removeClass("bg-success");
            }
            parente.children().addClass("bg-danger");
        } else {
            var correo =
                $.post("./backend/api.php", {
                    "CKcorreo": contenido
                })
                .done(respuesta => {
                    correo = JSON.parse(respuesta);
                    if (correo === true) {
                        $("#errorCorreo")
                            .css('display', 'inline-block')
                            .text("Correo no encontrado");

                        if (parente.children().hasClass("bg-success")) {
                            parente.children().removeClass("bg-success");
                        }
                        parente.children().addClass("bg-danger");
                    }
                    if (correo === false) {
                        $("#Errorcorreo")
                            .css('display', 'none')
                            .text("");
                        if (parente.children().hasClass("bg-danger")) {
                            parente.children().removeClass("bg-danger");
                        }
                        parente.children().addClass("bg-success");
                    }
                })
        }
    });

    // Quitar error en clave del Login
    $("#Logclave").blur(function () {
        let parente = $(this).parent();
        if (parente.children().hasClass("bg-danger")) {
            $("#errorClave")
                .css('display', 'none')
                .text("");

            parente.children().removeClass("bg-danger");
        }
    });

    // Enviar login
    $("#Flogin").submit(function (e) {
        e.preventDefault();
        $.post("./backend/api.php", {
                "login": "a",
                "correo": $("#Logcorreo").val(),
                "clave": $("#Logclave").val()
            })
            .done(respuesta => {
                let correcto = JSON.parse(respuesta);
                if (correcto == false) {
                    let parente = $("#Logclave").parent();

                    $("#errorClave")
                        .css('display', 'inline-block')
                        .text("Clave equivocada");

                    parente.children().addClass("bg-danger");

                }
                if (correcto == true) {
                    window.location.replace("./Index.php");
                }
            })
    })

    // Comprobar usuario
    $("#Regnombre").blur(function () {
        let parente = $(this).parent();
        let contenido = $(this).val();
        if (contenido == "") {
            $("#errorNombre")
                .css('display', 'inline-block')
                .text("Nombre Vacio");
            if (parente.children().hasClass("bg-success")) {
                parente.children().removeClass("bg-success");
            }
            parente.children().addClass("bg-danger");
        } else {
            var correo =
                $.post("./backend/api.php", {
                    "CheckNombre": contenido
                })
                .done(respuesta => {
                    correo = JSON.parse(respuesta);
                    if (correo === false) {
                        $("#errorNombre")
                            .css('display', 'inline-block')
                            .text("El nombre ya existe");

                        if (parente.children().hasClass("bg-success")) {
                            parente.children().removeClass("bg-success");
                        }
                        parente.children().addClass("bg-danger");
                    }
                    if (correo === true) {
                        $("#Errornombre")
                            .css('display', 'none')
                            .text("");
                        if (parente.children().hasClass("bg-danger")) {
                            parente.children().removeClass("bg-danger");
                        }
                        parente.children().addClass("bg-success");
                    }
                })
        }
    })

    // Comprobar correo en registro
    $("#Regcorreo").blur(function () {
        let parente = $(this).parent();
        let contenido = $(this).val();
        if (contenido == "") {
            $("#errorCorreo")
                .css('display', 'inline-block')
                .text("Correo Vacio");
            if (parente.children().hasClass("bg-success")) {
                parente.children().removeClass("bg-success");
            }
            parente.children().addClass("bg-danger");
        } else {
            var correo =
                $.post("./backend/api.php", {
                    "CKcorreo": contenido
                })
                .done(respuesta => {
                    correo = JSON.parse(respuesta);
                    if (correo === false) {
                        $("#errorCorreo")
                            .css('display', 'inline-block')
                            .text("El correo ya existe");

                        if (parente.children().hasClass("bg-success")) {
                            parente.children().removeClass("bg-success");
                        }
                        parente.children().addClass("bg-danger");
                    }
                    if (correo === true) {
                        $("#Errorcorreo")
                            .css('display', 'none')
                            .text("");
                        if (parente.children().hasClass("bg-danger")) {
                            parente.children().removeClass("bg-danger");
                        }
                        parente.children().addClass("bg-success");
                    }
                })
        }
    });

    // comprobar contraseña
    $("#Regclave").blur(function () {
        let parente = $(this).parent();

        if (!/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/.test($(this).val())) {
            $("#errorClave")
                .css('display', 'inline-block')
                .text("La contraseña no cumple los criterios");

            parente.children().addClass("bg-danger");
        } else {
            $("#errorClave")
                .css('display', 'none')
                .text("");

            parente.children().removeClass("bg-danger");
        }
    })

    // comprobar contraseña duplicado
    $("#RegclaveRep").blur(function () {
        let parente = $(this).parent();

        if ($(this).val() != $("#Regclave").val()) {
            $("#errorClaveRep")
                .css('display', 'inline-block')
                .text("La contraseña no cumple los criterios");

            parente.children().addClass("bg-danger");
        } else {
            $("#errorClaveRep")
                .css('display', 'none')
                .text("");
            $_POST['cambiarFoto']

            parente.children().removeClass("bg-danger");
        }
    })

    // enviar registro
    $("#registro").submit(function (e) {
        e.preventDefault();
        if ($("input.bg-danger").length <= 0) {
            $.post("./backend/api.php", {
                    "registro": "",
                    "clave": $("#Regclave").val(),
                    "correo": $("#Regcorreo").val(),
                    "nombre": $("#Regnombre").val()
                })
                .done(function (respuesta) {
                    console.log(respuesta)
                })

        }
    });

    $("#ajustes").click(function () {
        $('#modificar').toggleClass('invisible');
    })

    $('#cambiarNombre').click(function () {
        if($('#Regnombre').val()!=""){
            $.post("./backend/api.php", {
                'cambioNombre': $('#Regnombre').val()
            }).done(function (respuesta) {
                if (respuesta == 1) {
                    location.reload
                }
            })
        }
    })
});