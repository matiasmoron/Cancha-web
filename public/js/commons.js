$( document ).ready(function() {

 
  $(".form_datetime").datetimepicker({
        format: "dd MM yyyy",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
    
});


// Vuelve a la página anterior a la que estabas
function go_back(){
    window.history.back();
}