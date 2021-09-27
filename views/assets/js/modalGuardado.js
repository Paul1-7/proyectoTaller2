function datosNoValidos(valor){
    swal(
        "No se logró registrar "+valor,
        "los caracteres especiales no estan permitidos ni los espacios en blancos, intentelo de nuevo",
        "warning");
}

function guardadoExitoso(valor){
    swal(
        "Se registro "+valor+" exitosamente",
        "success");
}