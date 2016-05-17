function teste() {
	if(document.getElementByClassName('.campo').val()=="") {
		alert("Insira os campos abaixo!");
		document.getElementByClassName('.campo').focus();
		return false;
	}
}