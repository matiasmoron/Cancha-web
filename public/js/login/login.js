
$( document ).ready(function() {
   oyentes();
});

function oyentes(){

    
    $('#registrarse').on('click',function(e){
        e.preventDefault();
        $("#form_registrarse").toggle("slide",{},300);
        $("#form_ingresar").toggle("slide",{},300);
        $("#titulo").html("Registrate y reservá tu cancha YA");
        

    });

    $("#ingresar").click(function(e){
        e.preventDefault();
        $("#form_registrarse").toggle("slide",{},300);
        $("#form_ingresar").toggle("slide",{},300);
        $("#titulo").html("Ingresá y reservá tu cancha YA");

    });


}