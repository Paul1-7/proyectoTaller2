//subir foto y previsualizar  usuario
$(".fotoProd").change(function(){
    var imagen = this.files[0];
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
		fotoFormatoIncorrecto();
        $(".fotoProd").val("");
    }else if(imagen["size"] > 2000000){
		fotoPesoExcedido();
        $(".fotoProd").val("");	
    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".previsualizarProd").attr("src", rutaImagen);

        })

    }
});

//nuevo usuario
$(document).on("click", ".btnNuevoProd", function(){
	$(".previsualizar").attr("src", "views/img/usuarios/uProd.png");
});

// modificar usuario
usuarioProd = "";
$(document).on("click", ".btnEditarProd", function(){

	var idUsuario = $(this).attr("idUsuario");
	console.log(idUsuario);
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

            json = JSON.parse(respuesta);
			$("#nombresProd").val(json.nombre);
			$("#apellidosProd").val(json.apellido);
			$("#usuarioProd").val(json.usuario);
			$("#ciProd").val(json.ci);
			$(".previsualizar").attr("src", json.foto);
			$("#fotoProd").val(json.foto);
			$("#rolProd").val(json.rolesid_rol);
			$("#estadoProd").val(json.estado);
			$("#passwordProd").val(json.password);
			$("#idProd").val(json.id_Prod);
			usuarioProd =  json.usuario;     
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})

//validar usuario
$(".valProd").change(function(){

	$(".messages").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	 $.ajax({
	    url:"ajax/usuarios.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	   	dataType: "json",
	    success:function(respuesta){  	
	    	if(respuesta){
				if(usuarioProd != respuesta["usuario"]){
					$(".valProd").parent().after('<div class="messages" style="margin-top:-25px"><p class="text-danger error">Este usuario ya existe en la base de datos</p></div>');
					$(".valProd").val("");
				}
	    	}
	    },
		error: function(result){
            console.log("FALLO",result);
        }
	})
})