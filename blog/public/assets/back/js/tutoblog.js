var APP = function() {
    return{
        validacionGeneral: function (id, reglas, mensajes){
            const form = $('#'+id);
            form.validate({
                rules: reglas,
                messages:mensajes,
                errorElement: 'div',
                errorClass: 'invalid-feedback',
                focusInvalid: false,
                ignore: "",
                highlight: function (element){
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element){
                    $(element).removeClass('is-invalid');
                },
                success: function(element){
                    element.removeClass('is-invalid');
                },
                errorPlacement: function(error,element){
                    if (element.closest('.bootstrap-select').length >0) {
                        element.closest('.bootstrap-select').find('.bs-placeholder').after(error);
                    }else if($(element).is('select') && element.hasClass('select2-hidden-accesible')){
                        element.next().after(error);
                    }else{
                        error.insertAfter(element);
                    }
                },
                invalidHandler: function (event, validator){

                },
                submitHandler: function(form){
                    return true;
                }
            })
        }
    }
}();