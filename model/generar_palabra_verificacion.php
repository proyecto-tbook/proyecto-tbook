<?php	
	$palabra_v="";
	//$cedula_i="";
	$correo_i="";
	$correo_rc="";
	//invertir cedula
	/*for ($i=strlen($cedula_ibd)-1;$i>=0;$i--) { 
		$cedula_i=$cedula_i.$cedula_ibd[$i];
	}*/
	$a=$nombres_ibd;
	$b=$apellidos_ibd;
	$correo_rc=strstr($u_ibd,'@',true);
	for ($i=0; $i<strlen($a)+strlen($b); $i++) { 
		if($i<strlen($a))
			$a[$i]=chr(ord($a[$i])+1);					
		else
			$b[$i-strlen($a)]=chr(ord($b[$i-strlen($a)])+1);
	}
	for ($i=strlen($correo_rc)-1;$i>=0;$i--) { 
		$correo_i=$correo_i.$correo_rc[$i];
	}

	$palabra_v=$a.$b.$correo_i;
?>