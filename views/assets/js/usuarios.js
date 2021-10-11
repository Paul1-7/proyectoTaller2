
//subir foto y previsualizar  usuario
$(".fotoUser").change(function(){
    var imagen = this.files[0];
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
		fotoFormatoIncorrecto();
        $(".fotoUser").val("");
    }else if(imagen["size"] > 2000000){
		fotoPesoExcedido();
        $(".fotoUser").val("");	
    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            var rutaImagen = event.target.result;
            $(".previsualizar").attr("src", rutaImagen);

        })

    }
});

//nuevo usuario
$(document).on("click", ".btnNuevoUser", function(){
	$(".previsualizar").attr("src", "views/img/usuarios/user.png");
});

// modificar usuario
$(document).on("click", ".btnEditarUser", function(){

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
			$("#nombresUserEdit").val(json.nombre);
			$("#apellidosUserEdit").val(json.apellido);
			$("#usuarioUserEdit").val(json.usuario);
			$("#ciUserEdit").val(json.ci);
			$(".previsualizar").attr("src", json.foto);
			$("#fotoUserActual").val(json.foto);
			$("#rolUserEdit").val(json.rolesid_rol);
			$("#estadoUserEdit").val(json.estado);
			$("#passwordUserEditActual").val(json.password);
			$("#idUserActual").val(json.id_user);      
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})