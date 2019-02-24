$(document).ready(function(){
	console.log("document is ready");
	$("#hideLogin").click(function() {
		console.log("login was pressed");
		$("#loginForm").hide();
		$("#registerForm").show();
	});
	$("#hideRegister").click(function() {
		console.log("register was pressed");
		$("#loginForm").show();
		$("#registerForm").hide();
	});
})