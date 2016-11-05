
$( document ).ready(function() {
   eventos();
   filtros();
   cant_turnos(establec);
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

    $("#icono_filtros .abrir-filtro").on('click',function(e){
        //Abro el filtrado
        e.preventDefault();
        $(".resultados").addClass('filtro-visible');
        $(".left-column").removeClass("cerrar");
        $(".left-column").addClass("abrir");
    });

    $(".left-column .btn-cerrar").on('click',function(e){
        //Cierro el filtrado
        e.preventDefault();
        $(".resultados").removeClass('filtro-visible');
        $(".left-column").removeClass("abrir");
        $(".left-column").addClass("cerrar");

    });

}

function busqueda(){

    filtro = $("#busqueda").val().toUpperCase();
    console.log(filtro);

    $(".establecimiento").each(function(e){
        var nombre = $(this).data('nombre').toUpperCase();
        if(nombre.indexOf(filtro)>-1){
            $(this).show( 'slide', {}, 500,{});
        }
        else{
            $( this ).hide( 'slide', {}, 500,{});
        }
    })
}

//Voy mostrando las que tengan la clase correspondiente al filtrado
    //El filtrado es un OR cuando los filtros son del mismo tipo
        // Si checkean futbol 5 y futbol 7, tengo que mostrar todas las que cumplan con 1 o con el otro
    // Es un AND cuando son de distinto tipo:
        // Si checkean futbol 5 y sintético, tiene que cumplir las dos condiciones
function filtros(){

    // Filtrado por superficie
    $("#filtros :checkbox").on('click',function(e) {
        if ($("#filtros input:checkbox:checked").length == 0){
            //No hay ningun filtro checkeada, entonces muestro todos
            $(".cancha-turno").show();
            $(".establecimiento").show();
        }
        else{// Hay checkeados
            $(".cancha-turno").hide();

            //Obtiene todos los ids de los divs de canchas
            var canchas = $(".canchas_estab").map(function() {
                            return this.id; }).get();

            var filtros_sup = $("#superficie :checkbox:checked").map(function() {
                            return $(this).val(); }).get();

            var filtros_cant = $("#cant_jugadores :checkbox:checked").map(function() {
                            return $(this).val(); }).get();

            var filtros_caract = $("#caract :checkbox:checked").map(function() {
                            return $(this).val(); }).get();

            $(canchas).each(function(i,cancha){
                // console.log(cancha);
                
                //Agarro todos los divs que tiene la cancha y la tabla de turnos de turnos
                $(".cancha-turno","#"+cancha).each(function(){
                    elem = this.id;
                    if(tiene_alguna_clase(elem,filtros_sup) && tiene_alguna_clase(elem,filtros_cant) && tiene_alguna_clase(elem,filtros_caract)){
                        $(this).show();

                        id = $(this).parent().parent().data('estab');
                        if($("#estab_"+id).css('display') != 'block'){
                            $("#estab_"+id).show();
                        }
                    }
           
                });

            });
        }
        
        $('.canchas_estab').each(function(e){

            id_establec = $(this).data('estab');
            ocultar_establec =true;

            // Si hay alguna cancha visible , no oculto el establecimiento
            $('.cancha-turno',this).each(function(e){
               if($(this).css('display') == 'block'){
                   ocultar_establec=false;
               }
            });
            if(ocultar_establec){
                $("#estab_"+id_establec).hide();
            }
                  
        });
    });

   
}

function tiene_alguna_clase(elem,filtros){
    var tiene_filtro = true;
    if(filtros.length>0){
        tiene_filtro = false;
        $(filtros).each(function(i,filtro){
            if($("#"+elem).hasClass(filtro)){ 
                // Tiene la clase del filtro buscado
                tiene_filtro = true;
            }
        });
    }
    return tiene_filtro;
}

function cant_turnos(establec){

    var turnos_libres=0;
    var t_disp=0;
    $.each(establec, function(key, estab) {
        var id_est = "estab_"+estab[0]['id_est'];
        $.each(estab, function(key, cancha) {
            t_disp = t_disp +cancha['cant_turnos'];
        });
        //fin establecimiento
        
        $("#"+id_est+" .t-disp").html(t_disp);
        turnos_libres = turnos_libres +t_disp;
        t_disp=0;
    });

    
    console.log(turnos_libres);
    $(".t_libres").html(turnos_libres);

    $.each(establec, function(key, estab) {

        var id_est = "estab_"+estab[0]['id_est'];
        var menor_precio=10000;
        $.each(estab, function(key, cancha) {
            precios = cancha['precios'].split(',');
            $(precios).each(function(i,prec){
                menor_precio = (menor_precio>prec) ? prec : menor_precio;
            });
            
        });
        //fin establecimiento
        $("#"+id_est+" .b2").html("$"+menor_precio);

    });

}