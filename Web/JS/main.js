import "./jquery-3.6.0.min.js";
import "./jquery.tmpl.js";
import "./funciones.js"

$(document).ready(function () {
    var contenido = null;
    let respuesta = null;
    $('#nav').load("./componentes/navbar.html");
   
    $.get('./componentes/contenido.html')
        .done(template => {
            //Separar en funcion de la pagina
            $.post("./backend/api.php", {
                "busqueda": ""
            }).done(datos => {
                respuesta = JSON.parse(datos)
               
                    for (let i = 0; i < respuesta.length; i++) {
                        $.tmpl(template, respuesta[i]).appendTo("#resultados");
                    }
               
            });

            $("#busqueda").keyup(function () {
                $("#resultados").empty();
                var buscado = $(this).val();
                $.post("./backend/api.php", {
                    "busqueda": buscado
                }).done(respuesta => {
                    respuesta = JSON.parse(respuesta)
                    for (let i = 0; i < respuesta.length; i++) {
                        $.tmpl(template, respuesta[i]).appendTo("#resultados");
                    }
                });
            });
        });
});