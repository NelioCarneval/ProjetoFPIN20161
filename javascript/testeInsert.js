function teste() {
	if($(#email).val()=="") {
		alert("Insira seu email no campo abaixo!");
		$(#email).focus();
		return false;
	}
}