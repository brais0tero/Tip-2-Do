import "./jquery-3.6.0.min.js";
import "./jquery.tmpl.js";
import "./funciones.js";

$(document).ready(function () {

$("#Pelis").click(function(){
    $.get("./backend/ficheros.php",{"pelis":""}).done(function (respuesta) {
        let array = JSON.parse(respuesta);
        array.forEach(pelicula => {
            $.when(
                 $.getJSON("https://api.themoviedb.org/3/movie/" + pelicula['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es"),
                 $.getJSON("https://api.themoviedb.org/3/movie/"+pelicula['id']+"/credits?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es")
            ).done(function(peli,cast){
                $.post("./backend/api.php",{"agregarPelicula":peli[0],"miembro":cast[0]['cast']}).done(function(respuesta){
                    console.log(respuesta)
                })
            })
        });        
    });
})
    
$("#Series").click(function(){
    $.get("./backend/ficheros.php",{"seires":""}).done(function (respuesta) {
        let array = JSON.parse(respuesta);
        array.forEach(serie => {
            $.when(
                 $.getJSON("https://api.themoviedb.org/3/tv/" + serie['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es"),
                 $.getJSON("https://api.themoviedb.org/3/tv/"+serie['id']+"/credits?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es")
            ).done(function(serie,cast){
                console.log(serie[0])
                $.post("./backend/api.php",{"agregarPelicula":serie[0],"miembro":cast[0]['cast']}).done(function(respuesta){
                    console.log(respuesta)
                })
            })
        });        
    });
})
    
})