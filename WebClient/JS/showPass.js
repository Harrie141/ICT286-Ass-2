	function showPass(){
	let pass= document.getElementById("pwd");
	if(pass.type === "password"){
		pass.type = "text";
	}else{
	pass.type = "password";
	}
}

