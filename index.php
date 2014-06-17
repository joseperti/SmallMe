<?php 

	if ($_GET['i']==""){
		header("Location: /index/");
	}else{
		$db = new mysqli('localhost','u247433961_01','12345678','u247433961_01');
		$consulta = sprintf('SELECT * FROM LINK WHERE ID="%s"',base_convert($_GET['i'],36,10));
		$result = $db->query($consulta) or die($db->error);
		if (($result->num_rows) == 0){
			header("Location: /index/");
		}else{
			$row = $result->fetch_array();
			$texto = $row['TEXTO'];
			$consulta = sprintf('UPDATE LINK SET CLICKS = CLICKS + 1 WHERE TEXTO = "%s"',$texto);
			$result = $db->query($consulta) or die($db->error);
			$consulta = sprintf('UPDATE LINK SET ULTVISITA = "%s" WHERE TEXTO = "%s"',date('Y/m/d H:i:s'),$texto);
			$result = $db->query($consulta) or die($db->error);
			if (!strpos($texto, "http")){
				header ("Location: http://".$texto);
			}else{
				header("Location: ".$texto);
			}

			
		}
	}

?>