// modificar usuario
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
			$("#idCatActual").val(json.id_cat);
             
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})



//validar usuario
/*
$("#usuarioUser").change(function(){

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
				//document.getElementsByClassName("")
	    		$("#usuarioUser").parent().after('<div class="messages" style="margin-top:-25px"><p class="text-danger error">Este usuario ya existe en la base de datos</p></div>');
	    		$("#usuarioUser").val("");
				console.log(respuesta);
				console.log(typeof(respuesta));
	    	}
	    },
		error: function(result){
            console.log("FALLO",result);
        }
	})
})
*/

$(".tablas").on("click", ".btnEliminarCat", function(){

    var idCat = $(this).attr("idCat");

    //confirmacionBorrado("la categoria");
    swal({
        title: '¿Está seguro de borrar la categoría?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría!'
    })

    window.location = "index.php?ruta=categorias&idCat="+idCat;

})