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

	var idProd = $(this).attr("idProd");
	console.log(idProd);
	var datos = new FormData();
	datos.append("idProd", idProd);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

            json = JSON.parse(respuesta);
			$("#nombreProdEdit").val(json.nombre_prod);
			$("#stockProdEdit").val(json.stock_prod);
			$("#tipoUniProdEdit").val(json.tipo_uni_prod);
			$("#catProdEdit").val(json.categoriasid_cat);
			$("#marcaProdEdit").val(json.marcasid_marca);
			$(".previsualizarProd").attr("src", json.imagen_prod);
			$("#precioVentaProdEdit").val(json.precio_venta);
			$("#precioCompraProdEdit").val(json.precio_compra);
			$("#estadoProdEdit").val(json.estado_prod);
			$("#fotoProdActual").val(json.imagen_prod);
			$("#idProdActual").val(json.id_prod);
			    
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