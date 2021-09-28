
function datosNoValidos(valor){
    swal(
        "No se logró registrar "+valor,
        "los caracteres especiales no estan permitidos ni los espacios en blancos, intentelo de nuevo",
        "warning");
}

function guardadoExitoso(valor){
    swal({
        type: "success",
        title: "¡"+valor+" ha sido guardado correctamente!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
    });
        
}