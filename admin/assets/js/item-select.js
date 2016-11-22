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
					alert(data);
					$("#qty").attr("max", data);
					$("#qty").keyup(function (){
						if($(this).val() > data){
							sweetAlert("Ooops...", "Input exceeded maximum quantity", "error");
							$("#qty").val('');
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