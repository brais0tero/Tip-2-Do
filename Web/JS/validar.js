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
                    console.log(correo)
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
    $("#Regnombre").blur(function(){
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
                    "CKnombre": contenido
                })
                .done(respuesta => {
                    correo = JSON.parse(respuesta);
                    console.log(correo)
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
                    console.log(correo)
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

});