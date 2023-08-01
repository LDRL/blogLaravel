$(document).ready(function (){
    APP.validacionGeneral('form-general');
    $("icono").on('change',function(){
        $('mostrar-icono').removeClass().addclass($(this).val());
    })
});