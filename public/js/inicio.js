$( document ).ready(function() {
   oyentes();
});

function oyentes(){


    $('#deportes').on('change',function(e){
        e.preventDefault();
        if($(this).val()==1){
            console.log("FUTBOL");
        // $(document).css("background-color", "yellow");
        // $('body').css("background-image","url('../../fotos/img/futbol-turnos.jpg')");
        }
        if($(this).val()==2){
            console.log("basket");
        }
        if($(this).val()==3){
            console.log("otro");
        }

    });

    $("#deportes").append('<option value=1>Fútbol</option>')
    $("#deportes").append('<option value=2>Basket</option>')
    $("#deportes").append('<option value=3>que se yo</option>')
}

