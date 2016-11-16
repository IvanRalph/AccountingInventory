
$(document).ready(function(){

	$("#submit").click(function(){		

		swal({
			title: "Logging in...",
			showConfirmButton: false,
		});

		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;

		var firstForm = "username=" + username + "&" + "password=" + password;
		if(username != ""){
			if(password != ""){
				$.post("../php/validate.php",
				{
					username: username,
					password: password
				},
				function(data,status){
						alert(status);					
						alert(data);
						alert($.parseJSON(data));
				});

			} else {
				sweetAlert("Invalid Password");
			}
		} else {
			sweetAlert("Invalid Username");
		}

	});

});
