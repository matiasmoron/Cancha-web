$(document).ready(function(){
   console.log("hola");


   oyentes();
});

function oyentes(){


    $('#btn-turno').click(function(e){
        e.preventDefault();

        var turno = $('#fecha-turno').val();
        console.log(turno);
    });
}

