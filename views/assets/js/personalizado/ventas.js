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
      	}
     })
});

//quitar cliente de la venta
$(".formulario-venta").on("click", ".quitar-cliente", function(){

	$(this).remove();
	$("#ventaCliente").val("seleccione un cliente")
	$(".activar-cliente").removeClass('btn-disabled');
	$(".activar-cliente").addClass('btn-primary agregar-cliente');
/*
	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);

	}else{

		// SUMAR TOTAL DE PRECIOS

    	sumarTotalPrecios()

    	// AGREGAR IMPUESTO
	        
        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()

	}
	*/
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
						'<input class="form-control input-lg" type="text" name="nombresUser" value="'+nombreProd+'" readonly>'+
					'</div>'+
					'<div class="col-lg-2 input-group input-group-inverse" style="padding: 0px 0px 0px 5px;">'+
						'<input class="form-control input-md actualizar-cantidad" type="number" stock="'+stockProd+'" name="cantidad"  value="1" min="1" >'+
					'</div>'+
					'<div class="col-lg-2 input-group input-group-inverse div-subtotal" style="padding: 0px 0px 0px 5px;">'+
						'<input class="form-control subtotal" type="text" name="subtotal" id="subtotal" precioReal="'+precioProd+'" value="'+precioProd+' Bs." readonly>                                                      '+
					'</div>'+
				'</div>'
          	) 

	        // SUMAR TOTAL DE PRECIOS
	        sumarTotalPrecios()
				/*
	        // AGREGAR IMPUESTO

	        agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

	        $(".nuevoPrecioProducto").number(true, 2);


			localStorage.removeItem("quitarProducto");
			*/
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

		//$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);

	}else{

		// SUMAR TOTAL DE PRECIOS
		sumarTotalPrecios()

    	// AGREGAR IMPUESTO      
        //agregarImpuesto()
        // AGRUPAR PRODUCTOS EN FORMATO JSON
        //listarProductos()

	}
})


//actualiza la cantidad
$(".formulario-venta").on("change", ".actualizar-cantidad", function(){

	
	var precio = $(this).parent().parent().children(".div-subtotal").children();
	var precioFinal = $(this).val() * precio.attr("precioReal");
	precio.val(precioFinal);
	
	var nuevoStock = Number($(this).attr("stock")) - $(this).val();
	$(this).attr("nuevoStock", nuevoStock);

	//verifica si la cantidad ingresada no supera al stock
	if(Number($(this).val()) > Number($(this).attr("stock"))){
		$(this).val(1);
		//$(this).attr("nuevoStock", $(this).attr("stock"));

		var precioFinal = $(this).val() * precio.attr("precioReal");
		precio.val(precioFinal);

		//mensaje
		msgCantidadSuperaStock($(this).attr("stock"));

	}

	// SUMAR TOTAL DE PRECIOS
	sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    /*agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()
*/
})

//sumar total precio, impuestos
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
	let sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	
	//calculo iva
	let impuesto = 0.13;
	let ImpuestoTotal = Number(impuesto)* Number(sumaTotalPrecio);

	//iva + total


	//total sin impuestos
	$("#nuevoTotalVenta").val(parseFloat(sumaTotalPrecio).toFixed(2)+" Bs.");
	$("#totalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("totalVenta",sumaTotalPrecio);
	//calculo del iva
	$("#totalImpuesto").val(ImpuestoTotal.toFixed(2)+ " Bs.");
	//iva + total sin impuesto
	$("#totalConIVA").val((ImpuestoTotal+sumaTotalPrecio).toFixed(2)+ " Bs.");
}

//calcular impuesto
function agregarImpuesto(precioTotal){

	var impuesto = 0.13;
	
	var ImpuestoTotal = Number(impuesto)* Number(precioTotal);
	console.log(impuesto);
	console.log(precioTotal);
	console.log(impuesto*precioTotal);
	
	$("#totalImpuesto").val(ImpuestoTotal);
}