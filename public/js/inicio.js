$( document ).ready(function() {
   console.log("hola");


   oyentes();
});

function oyentes(){


    $('#fecha').on('change',function(e){
        e.preventDefault();

        console.log( $(this).val());

        $(document).css("background-color", "yellow");
        $('body').css("background-image","url('../../fotos/img/futbol-turnos.jpg')");
    });


}

