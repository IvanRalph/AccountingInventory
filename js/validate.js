$(document).ready(function(){
	$("#submit").click(function(e){
		e.preventDefault();
		var username = $("#username").val();
		var password = $("#password").val();
		var firstForm = "username=" + username + "&" + "password=" + password;
		$.ajax({
			url: "php/validate.php",
			type: "POST",
			dataType: "json",
			data:firstForm,
			success: function (data, result) {
                if (data.success == "true") {
                    sweetAlert("Success", data.name, "success");
                }else{
                	sweetAlert("Oops...", "Incorrect login details!", "error");
                }
            },
            error: function(data) {
                alert("WRONG");
            }
		});
		e.preventDefault();
	});
});