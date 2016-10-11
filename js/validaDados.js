function verificaDaodosSubmit(){
	if(validaMarca() && validaModelo() && validaData() && validaOpcionaisOnClick()){
		return true;
	} else {
		validaMarca();
		validaModelo();
		validaData(); 
		validaOpcionaisOnClick();
		return false;
	}
}

function validaMarca(){
	var verifica = true;
	var marca = document.getElementById('marcas').value;
	if(marca == 'selecione' || marca == undefined ){
		document.getElementById('msg_marca').style.display = 'block';
		verifica = false;
	} else {
		document.getElementById('msg_marca').style.display = 'none';
	}
				
	return verifica;
}

function validaModelo(){
	var verifica = true;
	
	var modelo = document.getElementById('modelo').value;
	if(modelo == '' || modelo == undefined ){
		document.getElementById('msg_modelo').style.display = 'block';
		verifica = false;
	} else {
			document.getElementById('msg_modelo').style.display = 'none';
	}
	
	return verifica;
}

function validaData(){
	var ano = document.getElementById('ano').value;
	if(isNaN(ano)){
		document.getElementById('msg_ano').style.display = 'block';
		return false;
	} else if(ano >= 1970 && ano <=2014){
		document.getElementById('msg_ano').style.display = 'none';
		return true;
	} else {
		document.getElementById('msg_ano').style.display = 'block';
		return false;
	}				
}

function validaOpcionaisOnClick() {
	var rows = document.getElementsByName('opcionais[]');
	var selectedRows = [];
	for (var i = 0, l = rows.length; i < l; i++) {
		if (rows[i].checked) {
			selectedRows.push(rows[i]);
			if(rows[i].value == 'ot' && document.getElementById('outro').value == ''){
				document.getElementById('msg_outro').style.display = 'block';
				document.getElementById('msg_opcionais').style.display = 'none';
				return false;
			}
		} else {
			if(rows[i].value == 'ot'){
				document.getElementById('msg_outro').style.display = 'none';
			}
		}
	}

	if(selectedRows.length < 1){
		document.getElementById('msg_opcionais').style.display = 'block';
		return false;
	} else {
		document.getElementById('msg_opcionais').style.display = 'none';
	}
	return true;
}

function limpar(){
	document.getElementById('marcas').value = '';
	document.getElementById('modelo').value = '';
	document.getElementById('ano').value = '';
	document.getElementById('outro').value = '';
	for (i = 0; i < document.getElementsByName('opcionais[]').length; i++)
    if (document.getElementsByName('opcionais[]')[i].type == "checkbox")
      document.getElementsByName('opcionais[]')[i].checked = false;
}