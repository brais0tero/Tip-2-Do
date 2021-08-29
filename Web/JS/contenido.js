import "./jquery-3.6.0.min.js";
import "./jquery.tmpl.js";
import "./funciones.js";

$(document).ready(function () {

    let contador
    //     let peliculasIDS = ""
    //     $.get("./backend/ficheros.php",{"obtenerPeliculas":""} ).done(function(respuesta){
    //     console.log(respuesta);
    // });
    //  $.getJSON("./backend/ficheros.php", {"obtenerPeliculas":""} ,
    //     function (data) {
    //         console.log("hola")
    //         // for (let index = 0; index < data.length; index++) {
    //         //     console.log(data[index])
    //         // }
    //     }
    // );

    $.get("./backend/ficheros.php", {
        "obtenerPeliculas": 0
    }).done(function (respuesta) {
        contador = 0;
        let array = JSON.parse(respuesta);

        // array.forEach(pelicula => {
        //     $.getJSON("https://api.themoviedb.org/3/movie/" + pelicula['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es").done(function (peli) {
        //         console.log(peli)
        //         $.post("./backend/api.php", {
        //             "agregarPeli": peli
        //         }).done(function (datos) {
        //             contador += datos;
        //         })
        //     });
        // });
        for (let i = 0; i < array.length; i++) {
            $.getJSON("https://api.themoviedb.org/3/movie/" + array[i]['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es").done(function (peli) {
                console.log(peli)
                $.post("./backend/api.php", {
                    "agregarPeli": peli
                }).done(function (datos) {
                    contador += datos;
                })
            });
            
        }
        console.log(contador)
    });

    
})