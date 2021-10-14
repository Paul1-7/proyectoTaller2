

function datosNoValidos(valor,metodo){
    swal(
        "No se logró "+metodo+" "+valor,
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


//imagenes
function fotoFormatoIncorrecto(){
    swal({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
}

function fotoPesoExcedido(){
    swal({
        title: "Error al subir la imagen",
        text: "¡La imagen no debe pesar más de 2MB!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
}

//borrar
function confirmacionBorrado(valor){
    swal({
        title: "¿Estas seguro de borrar "+valor+" ?",
        text: "Si no lo esta puede cancelar la accion",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, Borralo!",
        closeOnConfirm: false
    },
    function(){
        swal("Borrado!",valor+" se borro correctamente", "success");
    });
}
