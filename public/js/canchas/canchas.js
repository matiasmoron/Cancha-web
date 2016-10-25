$( document ).ready(function() {
   eventos();
});


function eventos(){

    $(".btn",".ver_canchas").on('click',function(e){
        e.preventDefault();
        var id = $(this).data('id');

        var cont = $("#canchas_estab_"+id);
        cont.toggle('fade',300);
        if(cont.css('display') == 'block'){
            $("i", this).toggleClass("fa-arrow-circle-down fa-arrow-circle-up");
        }
        else{
            $("i", this).toggleClass("fa-arrow-circle-up fa-arrow-circle-down");  
        }

    });

}