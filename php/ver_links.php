<?php 

	$link = $_POST['link'];
	$db = new mysqli('localhost','u247433961_01','12345678','u247433961_01');
	$consulta = sprintf('SELECT * FROM LINK');
	$result = $db->query($consulta) or die($db->error);
	while ($row = $result->fetch_array()){
		echo $row['TEXTO'];
	}

?>