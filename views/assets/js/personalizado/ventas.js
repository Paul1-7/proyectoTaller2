//cliente

//añadir cliente a la venta
$(".tabla-seleccion-cliente").on("click", ".agregar-cliente", function(){

	var idCliente = $(this).attr("idCliente");

	$(".agregar-cliente").addClass("btn-disabled activar-cliente");
	$(".agregar-cliente").removeClass("btn-primary agregar-cliente");

	var datos = new FormData();
    datos.append("idCl", idCliente);

     $.ajax({
     	url:"ajax/clientes.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    var nombreCl = respuesta["nombres_cl"];
          	var apellidoCl = respuesta["apellidos_cl"];
            var idCl = respuesta["id_cliente"];

			//agrega cliente a la venta
          	$(".venta-cliente").prepend(
				'<button type="button" class="btn btn-danger quitar-cliente " style="height:40px; width: 40px; padding: 0px;" >'+
					'<i class="icofont-close icofont-2x" style="margin-left: auto; margin-right: auto;"></i>'+
				'</button>'
				)
			$("#ventaCliente").val(nombreCl+" "+apellidoCl);
			$("#idCliente").val(idCl);
      	}
     })
});

//quitar cliente de la venta
$(".formulario-venta").on("click", ".quitar-cliente", function(){

	$(this).remove();
	$("#ventaCliente").val("seleccione un cliente")
	$(".activar-cliente").removeClass('btn-disabled');
	$(".activar-cliente").addClass('btn-primary agregar-cliente');
	$("#idCliente").val(-1);
})


//productos
//añadir producto a la venta

$(".tabla-seleccion-productos").on("click", ".agregar-producto", function(){

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregar-producto");
	$(this).addClass("btn-disabled");

	var datos = new FormData();
    datos.append("idProd", idProducto);

     $.ajax({
     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    var nombreProd = respuesta["nombre_prod"];
          	var stockProd = respuesta["stock_prod"];
          	var precioProd = respuesta["precio_venta"];
            var idProd = respuesta["id_prod"];

			//no agrega producto cuando stock esta en cero
          	if(stockProd == 0){

      			msgNoStock();
			    $("[idProducto='"+idProducto+"']").addClass("btn-primary agregar-producto");
				$("[idProducto='"+idProducto+"']").remove("btn-disabled");
			    return;
          	}
            
			//agrega a productos a la venta
          	$(".venta-productos").append(
				'<div class="row"> '+
					'<div class="col-lg-1 input-group input-group-inverse">'+
						'<button type="button" class="btn btn-danger quitar-producto" idProducto="'+idProd+'" style="height:40px; width: 45px; padding: 0px;" >'+
							'<i class="icofont-close icofont-2x" style="margin-left: auto; margin-right: auto;"></i>'+
						'</button>'+
					'</div>'+
					'<div class="col-lg-6 input-group input-group-inverse" style="padding: 0px 0px 0px 5px;">'+
						'<input class="form-control input-lg" type="text" value="'+nombreProd+'" readonly>'+
					'</div>'+
					'<div class="col-lg-2 input-group input-group-inverse" style="padding: 0px 0px 0px 5px;">'+
						'<input class="form-control input-md actualizar-cantidad" type="number" stock="'+stockProd+'"   value="1" min="1" >'+
					'</div>'+
					'<div class="col-lg-2 input-group input-group-inverse div-subtotal" style="padding: 0px 0px 0px 5px;">'+
						'<input class="form-control subtotal" type="text"  id="subtotal" precioReal="'+precioProd+'" value="'+precioProd+' Bs." readonly>                                                      '+
					'</div>'+
				'</div>'
          	) 

	        // SUMAR TOTAL DE PRECIOS
	        sumarTotalPrecios()
      	}
     })
});

//quitar productos de la venta
$(".formulario-venta").on("click", ".quitar-producto", function(){

	var idProducto = $(this).attr("idProducto");
	$(this).parent().parent().remove();
	
	$("[idProducto='"+idProducto+"']").removeClass('btn-disabled');
	$("[idProducto='"+idProducto+"']").addClass('btn-primary agregar-producto');

	if($(".venta-productos").children().length == 0){

		$("#nuevoTotalVenta").val("0.00 Bs.");
		$("#totalImpuesto").val("0.00 Bs.");
		$("#totalConIVA").val("0.00 Bs.");
	}else{

		// SUMAR TOTAL DE PRECIOS
		sumarTotalPrecios()
	}
})


//actualiza la cantidad
$(".formulario-venta").on("change", ".actualizar-cantidad", function(){
	
	var precio = $(this).parent().parent().children(".div-subtotal").children();
	var precioFinal = $(this).val() * precio.attr("precioReal");
	precio.val(precioFinal);
	
	//verifica si la cantidad ingresada no supera al stock
	if(Number($(this).val()) > Number($(this).attr("stock"))){
		$(this).val(1);
		
		var precioFinal = $(this).val() * precio.attr("precioReal");
		precio.val(precioFinal);

		//mensaje
		msgCantidadSuperaStock($(this).attr("stock"));

	}

	// SUMAR TOTAL DE PRECIOS
	sumarTotalPrecios()
})

//sumar total precio, impuestos
let checkAplicarIva=true;
let impuesto = 0;
let impuestoTotal=0;
let sumaTotalPrecio=0;
function sumarTotalPrecios(){

	var precioItem = $(".subtotal");
	var arraySumaPrecio = [];  
	for(var i = 0; i < precioItem.length; i++){
		valor=$(precioItem[i]).val().split(" ");
		 arraySumaPrecio.push(Number(valor[0]));
	}

	function sumaArrayPrecios(total, numero){
		return total + numero;
	}
	sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	
	//calculo iva
	impuesto = 0.13;
	impuestoTotal = Number(impuesto)* Number(sumaTotalPrecio);
	//total sin impuestos
	$("#nuevoTotalVenta").val(parseFloat(sumaTotalPrecio).toFixed(2)+" Bs.");
	$("#totalImpuesto").val(impuestoTotal.toFixed(2)+ " Bs.");
	$("#totalConIVA").val((impuestoTotal+sumaTotalPrecio).toFixed(2)+ " Bs.");
	
}

let listaProductos=[]
$(".formulario-venta").on("click", ".guardar", function(){

	var id = $(".quitar-producto");
	var cantidad = $(".actualizar-cantidad");
	
	for(var i = 0; i < id.length; i++){

		listaProductos.push({ "id" : $(id[i]).attr("idProducto"), 
							  "cantidad" : $(cantidad[i]).val()
							  })

	}
	$("#listaProd").val(JSON.stringify(listaProductos));
})

//aplica el iva si es requerido
$(".formulario-venta").on("change", "#aplicarIva", function(){
	checkAplicarIva=$('#aplicarIva:checked').length > 0;
	if(checkAplicarIva){
		$("#totalImpuesto").val(impuestoTotal.toFixed(2)+ " Bs.");
		$("#totalConIVA").val((impuestoTotal+sumaTotalPrecio).toFixed(2)+ " Bs.");
	}
	else{
		$("#totalImpuesto").val("0.00 Bs.");
		$("#totalConIVA").val((sumaTotalPrecio).toFixed(2)+ " Bs.");
	}
})

//verifica si no faltan datos
 $(document).on('submit', '.formulario-venta', function(e){
	 cliente = $("#idCliente").val();
	 if(listaProductos.length==0 || cliente==-1){
     	e.preventDefault();
		 msg = "Faltan los datos del cliente o del producto";
		 msgDatosIncompletos(msg);
	 }

 });