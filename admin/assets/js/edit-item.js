$("#button-save").click(function(){
		var item_name = document.getElementById("edit-name").value;
		var supplier_name = document.getElementById("edit-supplier-name").value;
		var item_price = document.getElementById("edit-price").value;
		var item_id = document.getElementById("show-item-id").innerHTML;
		if(item_name != ""){

			document.getElementById("name_error").innerHTML = "";

			if(supplier_name != ""){

				document.getElementById("supname_error").innerHTML = "";

				if(item_price != ""){

					document.getElementById("price_error").innerHTML = "";

					if(stock != ""){

						document.getElementById("stock_error").innerHTML = "";
						var form = "item_name=" + item_name + "&" + "supplier_name=" + supplier_name + "&" + "item_price=" + item_price + "&" + "item_id=" + item_id;
						$.ajax({
							url: "assets/php/edit-item.php",
							type: "POST",
							dataType: "text",
							data: form,
							success: function(data, result){
								if(data=="success"){
									//close the modal and alert success
									sweetAlert("Success", "Item Edited!","success");
									$("#edit-modal").modal("hide");
									$("#my-table").load(document.URL + " #my-table");
									document.getElementById("edit-item-form").reset();

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