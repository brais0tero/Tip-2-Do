import "./jquery-3.6.0.min.js";
import "./jquery.tmpl.js";
import "./funciones.js";

$(document).ready(function () {
//     let peliculasIDS = ""
//     $.get("./backend/ficheros.php",{"obtenerPeliculas":""} ).done(function(respuesta){
//     console.log(respuesta);
// });
// $.getJSON("./backend/ficheros.php", {"obtenerPeliculas":""} ,
//     function (data, textStatus, jqXHR) {
//         console.log(data)
//     },
//     "dataType"
// );
 $.get("./backend/ficheros.php", {"obtenerPeliculas":"Hola"},
     function (data, textStatus, jqXHR) {
        console.log(data)
     },
     "dataType"
 );
});


