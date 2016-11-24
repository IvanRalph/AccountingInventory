$(document).ready(function(){
	$("#sales-submit").click(function(){
		var transfer = false;
		if($("#transferYes").is(":checked")){
			transfer = true;
		}
		var item_name = $("#item-select").val();
		var qty = $("#qty").val();
		var total = $("#totalLabel").text();

		if(item_name != "None"){
			if(qty != "" && qty != 0){

				if($("#branch").prop("disabled")){
					var dataString = "item_name=" + item_name + "&" + "qty=" + qty + "&" + "total=" + total;
				} else {
					var branch = $("#branch").val();
					if(branch == "None"){
						sweetAlert("Oops...", "No branch selected", "error");
						return;
					} else {
						var dataString = "item_name=" + item_name + "&" + "qty=" + qty + "&" + "total=" + total + "&" + "branch=" + branch + "&" + "transfer=" + transfer;
					}
				}
				console.log(dataString);
			
				$.ajax({

					url: "assets/php/sales-form.php",
					type: "POST",
					dataType: "text",
					data: dataString,
					success: function(data, result){
						if(result=="success"){
							sweetAlert("Success", "Order Successful", "success");
							$("#my-table").load(document.URL + " #my-table");
							$("#totalLabel").text("PHP 0.00");
							$("#sales")[0].reset();
						}
					},
					error: function(data, errorThrown){
						console.log("error");	
					}
				});

			} else {
				sweetAlert("Oops.", "Invalid quantity entered", "error");
			}
		} else {
			sweetAlert("Oops.", "No item selected", "error");
		}

	});
});

