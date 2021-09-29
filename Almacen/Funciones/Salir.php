<?php
   session_start ();
?>
<HTML LANG="es">
<HEAD>
<TITLE>Desconectar</TITLE>
</HEAD>
<BODY>

<?php
	if (isset($_SESSION["usuario_valido"]))
   		{
	  		unset($_SESSION["usuario_valido"]);
	        session_destroy();
	     	echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= /GrupoLodi/">';
		 	  echo"<p>&nbsp;</p>";
			  echo"<p>&nbsp;</p>";
			  echo"<p>&nbsp;</p>";
			  echo"<p>&nbsp;</p>";
      	print ("<p><center></center></P>\n");
  			print ("<P ALIGN='CENTER'></P>\n");
   		}
   else
	   {
   		echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL= /GrupoLodi/">';
		print ("<P ALIGN='CENTER'></P>\n");
	   }
?>

</BODY>
</HTML>
