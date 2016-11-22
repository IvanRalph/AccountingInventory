$(document).ready(function(){
	$("#item-select").change(function(){
		var item_selected = $(this).val();
		var dataString = "item_selected=" + item_selected;

		$.ajax({
			url: "assets/php/item-select.php",
			type: "POST",
			dataType: "json",
			data: dataString,
			success: function(data, result){
				if(result == "success"){
					$("#qty").attr("max", data.stock);
					$("#qty").keyup(function (){
						var stock = eval(data.stock);
						var price = eval(data.price);
						if($(this).val() > stock){
							swal({
								title: "Oops..",
								text: "Input exceeded maximum quantity!<br><br>Remaining stock: "+stock,
								html: true,
								type: "error"
							});
							$("#qty").val('');
						}else{
							var total = data.price * $("#qty").val();
							$("#totalLabel").text("PHP " + total + ".00");
						}
					});

				}
			},
			error: function(data, errorThrown){
				alert(errorThrown);
			}
		});



	});
});