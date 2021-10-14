// modificar usuario
nombreCat ="";
$(document).on("click", ".btnEditarCat", function(){

	var idUsuario = $(this).attr("idCat");
	console.log(idUsuario);
	var datos = new FormData();
	datos.append("idCat", idUsuario);

	$.ajax({
		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
            json = JSON.parse(respuesta);
			$("#nombreCatEdit").val(json.nombre_cat);
			$("#descCatEdit").val(json.desc_cat);
            $("#estadoCatEdit").val(json.estado_cat);
			nombreCat=json.nombre_cat;
			$("#idCatActual").val(json.id_cat);
             
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})



//validar nombre
$(".valNombreCat").change(function(){
	$(".messages").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("validarNombre", usuario);

	 $.ajax({
	    url:"ajax/categorias.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	   	dataType: "json",
	    success:function(respuesta){  	
	    	if(respuesta){
				if(nombreCat != respuesta["nombre_cat"]){
					$(".valNombreCat").parent().after('<div class="messages" style="margin-top:-25px"><p class="text-danger error">Este nombre ya existe en la base de datos</p></div>');
					$(".valNombreCat").val("");
				}
				
	    	}
	    }
	})
})


$(".tablas").on("click", ".btnEliminarCat", function(){

    var idCat = $(this).attr("idCat");
	var mensaje = '¿Está seguro de borrar la categoría?';
	var ruta = "index.php?ruta=categorias&idCat="+idCat;
    confirmacionBorrado(mensaje,ruta)

})