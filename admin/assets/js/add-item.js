$(document).ready(function(){
	$("#button-add").click(function(){

		var item_name = document.getElementById("name").value;
		var supplier_name = document.getElementById("supplier_name").value;
		var item_price = document.getElementById("price").value;
		var stock = document.getElementById("stock").value;

		if(item_name != ""){

			document.getElementById("name_error").innerHTML = "";

			if(supplier_name != ""){

				document.getElementById("supname_error").innerHTML = "";

				if(item_price != ""){

					document.getElementById("price_error").innerHTML = "";

					if(stock != ""){

						document.getElementById("stock_error").innerHTML = "";
						var form = "item_name=" + item_name + "&" + "supplier_name=" + supplier_name + "&" + "item_price=" + item_price + "&" + "stock=" + stock;
						$.ajax({
							url: "assets/php/add-item.php",
							type: "POST",
							dataType: "text",
							data: form,
							success: function(data, result){
								if(data=="success"){
									//close the modal and alert success
									sweetAlert("Success", "Item Added!","success");
									$("#add-modal").modal("hide");
									$("#my-table").load(document.URL + " #my-table");
									document.getElementById("add-item-form").reset();
								}else if(data == "existSuccess"){
									sweetAlert("Success", "Item already exists, added stocks instead! <br><br> NOTE: Supplier name and price you entered has been discarded. For changes please, manually edit items..","success");
									swal({
									  title: "Be aware!",
									  text: "Item already exists, added stocks instead! <br><br> <strong style='color: #e74c3c'>NOTE:</strong> Supplier name and price you entered has been discarded. For changes please, manually edit items..",
									  html: true,
									  type: "warning"
									});
									$("#add-modal").modal("hide");
									$("#my-table").load(document.URL + " #my-table");
									document.getElementById("add-item-form").reset();
								}else{
									swal({
										title: "ERROR!",
										text: "Error: " + data,
										html: true,
										type: "error"
									});
									$("#add-modal").modal("hide");
									$("#my-table").load(document.URL + " #my-table");
									document.getElementById("add-item-form").reset();
								}
							},

							error: function(data, errorThrown){
								// alert error
								
							}
						});

					} else {

						document.getElementById("stock_error").innerHTML = "Invalid Input!";

					}

				} else{

					document.getElementById("price_error").innerHTML = "Invalid Input!";

				}

			} else {

				document.getElementById("supname_error").innerHTML = "Invalid Input!";

			}

		} else {

			document.getElementById("name_error").innerHTML = "Invalid Input!";

		}
	});
});





