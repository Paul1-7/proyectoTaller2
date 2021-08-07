// modificar usuario
nombreMarca ="";
$(document).on("click", ".btnEditarMarca", function(){

	var idMarca = $(this).attr("idMarca");
	console.log(idMarca);
	var datos = new FormData();
	datos.append("idMarca", idMarca);

	$.ajax({
		url:"ajax/marcas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
            json = JSON.parse(respuesta);
			$("#nombreMarcaEdit").val(json.nombre_marca);
            $("#estadoMarcaEdit").val(json.estado_marca);
			nombreMarca=json.nombre_marca;
			$("#idMarcaActual").val(json.id_marca);
			$("#nombreActual").val(json.nombre_marca);
			
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})



//validar nombre
$(".valNombreMarca").change(function(){
	$(".messages").remove();

	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("validarNombre", usuario);

	 $.ajax({
	    url:"ajax/marcas.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	   	dataType: "json",
	    success:function(respuesta){  	
	    	if(respuesta){
				if(nombreMarca != respuesta["nombre_marca"]){
					$(".valNombreMarca").parent().after('<div class="messages" style="margin-top:-25px"><p class="text-danger error">Este nombre ya existe en la base de datos</p></div>');
					$(".valNombreMarca").val("");
				}
				console.log(nombreMarca);
	    	}
	    }
	})
})


$(".tablas").on("click", ".btnEliminarMarca", function(){

    var idMarca = $(this).attr("idMarca");
	var mensaje = '¿Está seguro de borrar la marca?';
	var ruta = "index.php?ruta=marcas&idMarca="+idMarca;
    var modulo = "marca"
    confirmacionBorrado(mensaje,ruta,modulo);

})