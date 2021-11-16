

function datosNoValidos(mensaje){
    swal(
        mensaje,
        "los caracteres especiales no estan permitidos ni los espacios en blancos, intentelo de nuevo",
        "warning");
}

function guardadoExitoso(mensaje,ubicacion){
    swal({
        type: "success",
        title: mensaje,
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
    }).then(function(result){
        if(result.value){
            window.location = ubicacion;
            console.log("entroo");
        }
        
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
function confirmacionBorrado(mensaje,ruta,modulo){
  
    swal({
        title: mensaje,
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Si, borrar '+modulo.substr(0,modulo.length-1)+'!'
    }).then(function(result){
		if(result.value){
			window.location = ruta;
		}
	})
}

function borradoExitoso(mensaje,ubicacion){
    swal({
        type: "success",
        title: mensaje,
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
        }).then(function(result){
            if (result.value) {
            window.location = ubicacion;
            }
        })
}

function borradoSinExito(mensaje){
    swal(
        mensaje,
        "intentelo de nuevo",
        "warning");
}

function borradoErrorIntegridad(mensaje){
    swal(
        mensaje,
        "Puede cambiar el estado del registro para que no aparezcan en las listas",
        "warning");
}


//venta
function msgNoStock(){
    swal({
        title: "No hay stock disponible",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
}

function msgCantidadSuperaStock(stock){
    swal({
        title: "La cantidad supera el Stock",
        text: "¡Sólo hay "+stock+" unidades!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
}

function msgDatosIncompletos(msg){
    swal({
        title: "No se puede realizar la venta",
        text: msg,
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });
}