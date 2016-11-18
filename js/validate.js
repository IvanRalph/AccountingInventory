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
                    sessionStorage.setItem("user", username);
                    window.location.href = "admin/dashboard.html";
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