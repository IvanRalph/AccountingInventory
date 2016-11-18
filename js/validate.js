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
                    window.location.href = "admin/dashboard.php";
                }else{
                	sweetAlert("Oops...", "Incorrect login details!", "error");
                	$("#password").val("");
                }
            },
            error: function(data) {
                alert("Error");
            }
		});
		e.preventDefault();
	});
});