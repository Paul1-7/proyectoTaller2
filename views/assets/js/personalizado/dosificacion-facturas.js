// modificar dosificacion
$(document).ready(function(){
    var datos = new FormData();
	datos.append("id_dosificacion", 1);

	$.ajax({
		url:"ajax/dosificacion-facturas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

            json = JSON.parse(respuesta);
			$("#numAutorizacion").val(json.num_autorizacion);
            $("#numFactInicial").val(json.num_fact_inicial);
			$("#llaveDosificacion").val(json.llave_dosificacion);
			$("#FechaLimiteEmision").val(json.fecha_lim_emision);
		},
        error: function(result){
            console.log("FALLO",result);
        }

	});

})
