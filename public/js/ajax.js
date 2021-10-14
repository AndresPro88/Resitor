function consultarDni(dni){
    $.ajax({
        url: '/consultar_dni',
        method: 'POST',
        data: {'dni' : dni},
        success: function(respuesta) {
            if(respuesta['existe'] === 'true' || respuesta['existe'] === true){
                dniError();
            }else{
                verificarDni(dni);
            }
        },
        error: function() {
            console.log("No se ha podido obtener la información");
        }
    });
}
    var abcdario = 'TRWAGMYFPDXBNJZSQVHLCKET';

    function verificarDni(dni){
        dniError();
        if (dni.length==9) {
            if (obtenerLetra(dni)) {
                if (verificarNumeros(dni)) {
                    if (modular(dni)) {
                        dniBien();
                    }
                }
            }
        }
    }

    function modular(dni){
        var numero = dni.substr(0,dni.length-1);
        var letra = dni[dni.length-1];
        if (abcdario.charAt(numero % 23).toUpperCase()==letra.toUpperCase()){
            return true;
        }else{
            return false;
        }
    }

    function verificarNumeros(dni){
        for (let i = 0; i < dni.length-1; i++) {
            if(isNaN(parseInt(dni[i]))){
                return false;
            }
        }
        return true;
    }
    function obtenerLetra(dni){
        for (let i = 0; i < abcdario.length ; i++) {
            if (abcdario[i].toUpperCase()==dni[dni.length -1]){
                return true;
            }
        }
        return false;
    }


    function dniBien(){
        $('#residente_dni').removeClass('is-invalid');
        $('#residente_dni').addClass('is-valid');
        $('#dniError').addClass('d-none');
    }
    function dniError(){
        $('#residente_dni').removeClass('is-valid');
        $('#residente_dni').addClass('is-invalid');
        $('#dniError').removeClass('d-none');
    }
