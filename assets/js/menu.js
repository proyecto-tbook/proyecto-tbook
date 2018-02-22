


document.write("<div class='menu_bar'>");
	document.write("<a href='http://localhost:8080/tbookV3' class='bt-menu'><span class='icon-menu'></span>TBOOK</a>");
	document.write("<div id='div_form' class='navbar navbar-light bg-light'>");
		document.write("<form class='form-inline'>");
			document.write("<input class='form-control mr-sm-2' type='search' placeholder='Buscar libros ...' aria-label='Search'>")
			document.write("<button id='b_search' class='btn btn-outline-success my-2 my-sm-0' type='submit'><span class='icon-search'></span></button>");
		document.write("</form>");
	document.write("</div>");
document.write("</div>");
document.write("<nav>");
document.write("<ul>");
document.write("<li><a href='index.php'>Inicio </a></li>");
document.write("<li><a href='intermedio_acceder_doc.php'><span class='icon-user-tie'></span>Biblioteca</a></li>");
document.write("<li><a href='#'><span class='icon-phone'></span>Politicas</a></li>");
document.write("<li><a id='registrarse' class='registrate'  data-toggle='modal' style='margin-left: 10%' data-target='#myModal' href='./view/login.php'>Iniciar Sesión</a></li>");
document.write("<div id='avatar' class='avatar'>");
    document.write(" <a href='javascript:opcAvatar();'><span class='icon-circle-down'></span><span>|</span></a><a href='estudiante.php' target='_blank'><?php echo $_SESSION['fullname']?></a>");
    document.write("  <div class='opc_avatar'>");
   document.write("     <ul>");
     document.write("     <li><a href='user.php' target='_blank'>Mi perfil</a></li>");
     document.write("     <li><a href='../controller/cerrarSesion.php'>Salir</a></li>");
     document.write("   </ul>");
     document.write(" </div>");
   document.write(" </div>");
document.write("</ul>");
document.write("</nav>");
