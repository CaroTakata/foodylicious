
$(document).ready(function(){
    
    $("#botonBuscar").click( function(){
        $("#homeFiltros").slideDown(800);
    });

    $("#verperfil1").click(function(){
        $("#linkverperfil").trigger("click");
    });
});
