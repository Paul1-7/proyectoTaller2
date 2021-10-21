// modificar cliente
ciCliente ="";
$(document).on("click", ".btnModificarCl", function(){

	var idCliente = $(this).attr("idCl");
	var datos = new FormData();
	datos.append("idCl", idCliente);

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
            console.log(respuesta);
            json = JSON.parse(respuesta);
			$("#nombreCl").val(json.nombres_cl);
			$("#apellidoCl").val(json.apellidos_cl);
            $("#ciCl").val(json.ci_cl);
            $("#telCl").val(json.tel_cl);
            $("#direccionCl").val(json.direccion_cl);
            $("#estadoCl").val(json.estado_cl);
			ciCliente=json.ci_cl;
			$("#idClActual").val(json.id_cliente);
             
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})



//validar ci
$(".valCiCl").change(function(){
	$(".messages").remove();

	var ci = $(this).val();
	var datos = new FormData();
	datos.append("validarCi", ci);

	 $.ajax({
	    url:"ajax/clientes.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	   	dataType: "json",
	    success:function(respuesta){  	
	    	if(respuesta){
				if(ciCliente != respuesta["ci_cl"]){
					$(".valCiCl").parent().after('<div class="messages" style="margin-top:-25px"><p class="text-danger error">Este carnet de identidad ya existe en la base de datos</p></div>');
					$(".valCiCl").val("");
				}
				
	    	}
	    }
	})
})


$(".tablas").on("click", ".btnEliminarCl", function(){

    var idCliente = $(this).attr("idCl");
	var mensaje = '¿Está seguro de borrar al cliente?';
	var ruta = "index.php?ruta=clientes&idCl="+idCliente;
	var modulo = "clientes"
    confirmacionBorrado(mensaje,ruta,modulo);

})