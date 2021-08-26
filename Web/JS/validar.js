import "./jquery-3.6.0.min.js";

$(document).ready(function () {

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
                    // console.log(JSON.parse(respuesta))
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

    $("#Logclave").blur(function () {
        let parente = $(this).parent();
        if (parente.children().hasClass("bg-danger")) {
            $("#errorClave")
                .css('display', 'none')
                .text("");

            parente.children().removeClass("bg-danger");
        }

    });

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
});