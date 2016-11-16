$(document).ready(function(){
	$.ajax({
		url: "../php/login.php",
		success: function(output){
			console.log(output);
			if(output != "success"){
				window.location.href = "../index.html";
			}
		}
	});
});