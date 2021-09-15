function consultarDni(dni){
    $.ajax({
        url: '/consultar_dni',
        method: 'POST',
        data: {'dni' : dni},
        success: function(respuesta) {
            if(respuesta['existe'] === 'false' || respuesta['existe'] === false){
                $('#residente_dni').removeClass('is-valid');
                $('#residente_dni').addClass('is-invalid');
                $('#dniError').removeClass('d-none');
            }else{
                $('#residente_dni').removeClass('is-invalid');
                $('#residente_dni').addClass('is-valid');
                $('#dniError').addClass('d-none');
            }
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });
}