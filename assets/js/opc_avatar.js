			var contador=1;
		function openventana(){
			$('#ventana_emerg').toggle();
		}
		function openventana2(){
			$('#v_aceptar').toggle();
		}
		function desaparecer(){
			document.getElementById('registrarse').style.display = 'none';
			document.getElementById('ini_sesion').style.display = 'none';
		}
		function aparecer(){
			document.getElementById('avatar').style.display = 'block';
		}
			
		
		function opcAvatar(){
			if(contador==1){
			$('.opc_avatar').slideDown("slow");
			contador=0;
		}
		else{
			$('.opc_avatar').slideUp("slow");
			contador=1;
		}

	}