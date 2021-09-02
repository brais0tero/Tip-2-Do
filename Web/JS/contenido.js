import "./jquery-3.6.0.min.js";
import "./jquery.tmpl.js";
var pelis;
var miembro;
var usuario;
$(document).ready(function () {

$("#PelisBTN").click(function(){
    $.get("./backend/ficheros.php",{"pelis":""}).done(function (respuesta) {
        let array = JSON.parse(respuesta);
        console.log(array)
        array.forEach(pelicula => {
            $.when(
                 $.getJSON("https://api.themoviedb.org/3/movie/" + pelicula['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es"),
                 $.getJSON("https://api.themoviedb.org/3/movie/"+pelicula['id']+"/credits?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es")
            ).done(function(peli,cast){
                $.post("./backend/api.php",{"agregarPeliculaA":peli[0],"miembro":cast[0]['cast']}).done(function(respuesta){
                    console.log(respuesta)
                })
            })
        });        
    });
})
    
$("#SeriesBTN").click(function(){
    $.get("./backend/ficheros.php",{"series":""}).done(function (respuesta) {
       
        let array = JSON.parse(respuesta);
        console.log(array)
        array.forEach(serie => {
            $.when(
                 $.getJSON("https://api.themoviedb.org/3/tv/" + serie['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es"),
                 $.getJSON("https://api.themoviedb.org/3/tv/"+serie['id']+"/credits?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es")
            ).done(function(serie,cast){
                $.post("./backend/api.php",{"agregarSerieA":serie[0],"miembro":cast[0]['cast']}).done(function(respuesta){
                    console.log(respuesta)
                })
            })
        });        
    });
})
$("#ActoresBTN").click(function(){
    $.post("./backend/api.php",{'obtenerMiembros':''}).done(array=>{
       let actores = JSON.parse(array);
         actores.forEach(actor => { 
            $.when( $.getJSON("https://api.themoviedb.org/3/person/" + actor['id'] + "?api_key=19c3566418f0ba14b90ec6aa269802cb&language=es-es")).done(function(cast){
                $.post("./backend/api.php",{"actualizarMiembroA":cast}).done(function(respuesta){
                    console.log(respuesta)
                })
                })
            })
        });
    });

    $.post('./backend/api.php',{'obtenerPeliculas':''}).done(peliculas=>{
        pelis= JSON.parse(peliculas);
        console.log(pelis);
        pelis.forEach(pelicula => {
            $('#tablPelicula').append("<tr><td>"+pelicula['id']+"</td><td>"+pelicula['itulo']+"</td><td>"+pelicula['clasificacion']+"</td><td>"+pelicula['Tipo']+"</td><td"+pelicula['sinopsis']+"</td><td>"+pelicula['imagen']+"</td><td>"+pelicula['imagenPortada']+"</td><td>"+pelicula['Estreno']+"</td><td>"+pelicula['duracion']+"</td><td>"+pelicula['nota']+"</td></tr>");
        });
    })


})
